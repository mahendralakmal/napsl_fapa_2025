<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JudgersPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('judging.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show the marking carousel for judgers.
     */
    public function markingCarousel(Request $request)
    {
        $files = Storage::files('public/uploads');
        $images = [];
        foreach ($files as $file) {
            // Convert storage path to public URL
            $images[] = Storage::url($file);
        }
        $category = $request->input('category', 'monochrome'); // Default to 'monochrome' if not specified
        return view('judging.marking-carousel', compact('category','images'));
    }
}
