<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ExhibitionEntries;

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
        // $entries = ExhibitionEntries::with('user','user.fapa')->where("section",$request->category)->get();
        $entries = ExhibitionEntries::with(['user', 'user.fapa', 'myJudging'])
            ->where('section', $request->category)
            ->get();

        // dd($entries[0]['myJudging']); // Debugging line to check the myJudging relationship
        $images = array();
        foreach ($entries  as $index=>$entry) {
            // Convert storage path to public URL
            $images[$index]['image_id'] = $entry->id;
            $images[$index]['image'] = $entry->image;
            $images[$index]['caption'] = $entry->image_caption;
            $images[$index]['my_judging'] = $entry->myJudging ? $entry->myJudging->mark : null;
        }

        // dd($images[0]['image']); // Debugging line to check the images array
        $category = $request->input('category', 'monochrome'); // Default to 'monochrome' if not specified
        return view('judging.marking-carousel', compact('category','images'));
    }
}
