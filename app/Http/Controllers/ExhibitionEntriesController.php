<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExhibitionEntriesRequest;
use App\Http\Requests\UpdateExhibitionEntriesRequest;
use App\Models\ExhibitionEntries;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;

class ExhibitionEntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $entries = ExhibitionEntries::where('user_id',auth()->user()->id)->get();
        return view('upload_entries',compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'image_caption' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpg,jpeg|max:2048|dimensions:max_width=1920,max_height=1080',
        ],
        [
            'image_caption.required' => 'Title is required.',
            'image_caption.max' => 'Title may not be greater than 255 characters.',
            'image.required' => 'Image is required.',
            'image.mimes' => 'Image must be a file of type: jpg, jpeg.',
            'image.max' => 'Image should not be Exceeds the file size than 2MB.',
            'image.dimensions' => 'Exceeds the image pixel dimensions 1920px maximum width and 1080px maximum height.',
        ]);

        $data = [
            'exhibition_id' => 1,
            'user_id' => auth()->id(),
            'section' => $request->section,
            'image_caption' => $request->image_caption,
            'count' => $request->count,
        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $path;
        }

        $entry = \App\Models\ExhibitionEntries::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'section' => $request->section,
                'count' => $request->count,
            ],
            $data
        );

        return response()->json(['success' => true, 'image_url' => isset($data['image']) ? asset('storage/' . $data['image']) : null]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExhibitionEntries $exhibitionEntries): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExhibitionEntries $exhibitionEntries): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExhibitionEntriesRequest $request, ExhibitionEntries $id)

    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExhibitionEntries $upload_image)
    {
        // Delete the image file if it exists
        if ($upload_image->image && Storage::disk('public')->exists($upload_image->image)) {
            Storage::disk('public')->delete($upload_image->image);
        }

        // Delete the database record
        $upload_image->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Display a listing of the user's entries.
     */
    public function userEntries()
    {
        $entries = \App\Models\ExhibitionEntries::where('user_id', auth()->id())->get();
        return response()->json($entries);
    }

    /**
     * Send finish email to the user.
     */
    public function sendFinishEmail(Request $request)
    {
        $user = auth()->user();
        Log::info('Sending finish email to user: ', ['user_id' => $user->id, 'email' => $user->email, 'name' => $user->fapa->name]);
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        \Mail::to($user->email)->queue(new \App\Mail\FinishSubmissionMail($user));
        return response()->json(['success' => true]);
    }

    /**
     * Download the entry image.
     */
    public function downloadImages()
    {
        $entries = ExhibitionEntries::with('user','user.fapa')->get();
        // dd($entries);
        // Temporary zip path
        $zipFileName = 'exhibition-images-' . now()->format('YmdHis') . '.zip';
        $zipFilePath = storage_path('app/public/zips/' . $zipFileName);

        // Ensure zip directory exists
        Storage::disk('public')->makeDirectory('zips');

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            $filesAdded = 0;
            foreach ($entries as $index => $entry) {
                $imagePath = storage_path('app/public/' . $entry->image);

                if (is_file($imagePath) && file_exists($imagePath)) {
                    $username = Str::slug($entry->user->fapa->name ?? 'section');
                    $country = Str::slug($entry->user->fapa->country ?? 'country');
                    $caption = Str::slug($entry->image_caption ?? 'image_caption');
                    $category = Str::slug($entry->section ?? 'section');
                    $ext = pathinfo($imagePath, PATHINFO_EXTENSION);
                    $imageNumber = $entry->count; // Use count or index as image number

                    $customName = "{$imageNumber}_{$category}_{$caption}.{$ext}";

                    $zip->addFile($imagePath, $customName);
                    $filesAdded++;
                }
                // else: skip or log
            }
            $zip->close();

            if ($filesAdded === 0) {
                return response()->json(['error' => 'No valid images found to zip.'], 404);
            }

            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        }

        return back()->with('error', 'Could not create zip file.');
    }
}
