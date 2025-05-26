<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExhibitionEntriesRequest;
use App\Http\Requests\UpdateExhibitionEntriesRequest;
use App\Models\ExhibitionEntries;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
        try {
            $request->validate([
                'image_caption' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048|dimensions:max_width=1920,max_height=1080',
            ], [
            'image_caption.required' => 'Title is required.',
            'image_caption.max' => 'Title may not be greater than 255 characters.',
            'image.required' => 'Image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Image must be a file of type: jpeg.',
            'image.max' => 'Image should not be larger than 2MB.',
            'image.dimensions' => 'Image dimensions must not exceed 1920px width and 1080px height.',
        ]);

            $data = [
                'exhibition_id' => 1, // or your logic
                'user_id' => auth()->id(),
                'section' => $request->section,
                'image_caption' => $request->image_caption,
                'count' => $request->count,
            ];

            // Handle image upload
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('uploads', 'public');
                $data['image'] = $path;
            }

            // Update if exists, otherwise create
            $entry = \App\Models\ExhibitionEntries::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'section' => $request->section,
                    'count' => $request->count,
                ],
                $data
            );

            return response()->json(['success' => true, 'image_url' => isset($data['image']) ? asset('storage/' . $data['image']) : null]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return errors as JSON with 422 status
            return response()->json(['errors' => $e->errors()], 422);
        }
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
    public function destroy(ExhibitionEntries $exhibitionEntries): RedirectResponse
    {
        //
    }

    /**
     * Display a listing of the user's entries.
     */
    public function userEntries()
    {
        $entries = \App\Models\ExhibitionEntries::where('user_id', auth()->id())->get();
        return response()->json($entries);
    }
}
