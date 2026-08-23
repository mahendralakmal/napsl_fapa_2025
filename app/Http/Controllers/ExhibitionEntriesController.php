<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateExhibitionEntriesRequest;
use App\Mail\FinishSubmissionMail;
use App\Models\ExhibitionEntries;
use App\Rules\ValidExhibitionJpeg;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ExhibitionEntriesController extends Controller
{
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $user = auth()->user();
        $entries = ExhibitionEntries::where('user_id', $user->id)->get();
        $entriesSubmitted = $user->hasSubmittedEntries();

        return view('upload_entries', compact('entries', 'entriesSubmitted'));
    }

    public function create(): Response
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $user = auth()->user();

            if ($user->hasSubmittedEntries()) {
                return response()->json([
                    'errors' => [
                        'image' => ['Your entries are already submitted. Uploading is locked.'],
                    ],
                ], 403);
            }

            $request->validate([
                'image_caption' => 'required|string|max:255',
                'image' => ['required', new ValidExhibitionJpeg()],
                'section' => 'required|string|max:100',
                'count' => 'required|integer|min:1|max:4',
            ], [
                'image_caption.required' => 'Title is required.',
                'image_caption.max' => 'Title may not be greater than 255 characters.',
                'image.required' => 'Image is required.',
            ]);

            $data = [
                'exhibition_id' => 1,
                'user_id' => $user->id,
                'section' => $request->section,
                'image_caption' => $request->image_caption,
                'count' => $request->count,
            ];

            $existing = ExhibitionEntries::where([
                'user_id' => $user->id,
                'section' => $request->section,
                'count' => $request->count,
            ])->first();

            if ($request->hasFile('image')) {
                if ($existing && $existing->image && $existing->image !== '0' && Storage::disk('public')->exists($existing->image)) {
                    Storage::disk('public')->delete($existing->image);
                }

                $disk = Storage::disk('public');
                if (!$disk->exists('uploads')) {
                    $disk->makeDirectory('uploads');
                    @chmod($disk->path('uploads'), 0777);
                }

                $storedPath = $request->file('image')->store('uploads', 'public');

                if (!$storedPath || $storedPath === '0' || !$disk->exists($storedPath)) {
                    Log::error('Entry file store failed', [
                        'user_id' => $user->id,
                        'storedPath' => $storedPath,
                        'uploads_writable' => is_writable($disk->path('uploads')),
                    ]);

                    return response()->json([
                        'errors' => [
                            'image' => ['Could not save the image file. Please try again.'],
                        ],
                    ], 500);
                }

                $data['image'] = $storedPath;
            }

            if (empty($data['image']) && (!$existing || empty($existing->image) || $existing->image === '0')) {
                return response()->json([
                    'errors' => [
                        'image' => ['Image is required.'],
                    ],
                ], 422);
            }

            $entry = ExhibitionEntries::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'section' => $request->section,
                    'count' => $request->count,
                ],
                $data
            );

            // Reload so we return the persisted path
            $entry->refresh();

            return response()->json([
                'success' => true,
                'entry_id' => $entry->id,
                'image_url' => ($entry->image && $entry->image !== '0')
                    ? asset('storage/' . $entry->image)
                    : null,
            ]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Throwable $e) {
            Log::error('Entry upload failed', ['error' => $e->getMessage()]);
            return response()->json(['errors' => ['image' => ['Upload failed. Please try again.']]], 500);
        }
    }

    public function show(ExhibitionEntries $exhibitionEntries): Response
    {
        //
    }

    public function edit(ExhibitionEntries $exhibitionEntries): Response
    {
        //
    }

    public function update(UpdateExhibitionEntriesRequest $request, ExhibitionEntries $id)
    {
        dd($request->all());
    }

    public function destroy(ExhibitionEntries $upload_image)
    {
        $user = auth()->user();

        if ($user->hasSubmittedEntries()) {
            return response()->json(['error' => 'Your entries are already submitted. Deleting is locked.'], 403);
        }

        if ((int) $upload_image->user_id !== (int) $user->id && !$user->isAdmin()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if ($upload_image->image && Storage::disk('public')->exists($upload_image->image)) {
            Storage::disk('public')->delete($upload_image->image);
        }

        $upload_image->delete();

        return response()->json(['success' => true]);
    }

    public function userEntries()
    {
        $user = auth()->user();
        $entries = ExhibitionEntries::where('user_id', $user->id)->get();

        return response()->json([
            'entries' => $entries,
            'entries_submitted' => $user->hasSubmittedEntries(),
        ]);
    }

    public function sendFinishEmail(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if ($user->hasSubmittedEntries()) {
            return response()->json(['error' => 'Entries already submitted.'], 422);
        }

        $entries = ExhibitionEntries::where('user_id', $user->id)
            ->orderBy('section')
            ->orderBy('count')
            ->get();

        if ($entries->isEmpty()) {
            return response()->json(['error' => 'Please upload at least one entry before clicking Done.'], 422);
        }

        $user->load('fapa');

        $recipient = optional($user->fapa)->email ?: $user->email;
        if (!$recipient || !filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'error' => 'No valid email found on your profile. Please update your Entry Form email and try again.',
            ], 422);
        }

        try {
            $mail = Mail::to($recipient);

            // Also notify the login email when it differs from the profile email
            if (
                $user->email
                && strcasecmp($user->email, $recipient) !== 0
                && filter_var($user->email, FILTER_VALIDATE_EMAIL)
                && !str_ends_with(strtolower($user->email), '.local')
            ) {
                $mail->cc($user->email);
            }

            $mail->send(new FinishSubmissionMail($user, $entries));

            $user->forceFill([
                'entries_submitted_at' => now(),
            ])->save();

            Log::info('Finish email sent', [
                'user_id' => $user->id,
                'email' => $recipient,
                'login_email' => $user->email,
                'entries' => $entries->count(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Confirmation email sent to ' . $recipient . '. Your entries are now locked.',
            ]);
        } catch (\Throwable $e) {
            Log::error('Finish email failed', [
                'user_id' => $user->id,
                'email' => $recipient,
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'error' => 'Could not send confirmation email. Please try again or contact the organizer.',
            ], 500);
        }
    }
}
