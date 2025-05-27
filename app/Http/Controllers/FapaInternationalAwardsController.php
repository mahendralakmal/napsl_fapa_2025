<?php

namespace App\Http\Controllers;

use App\Models\FapaInternationalAwards;
use Illuminate\Http\Request;

class FapaInternationalAwardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = \App\Models\FapaInternationalAwards::where('user_id', auth()->id())->first();
        return view('pages-profile', compact('profile'));
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
        $validated = $request->validate([
            'title' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'honors' => 'nullable|string|max:255',
            'club' => 'nullable|string|max:255',
            'address' => 'required|string|max:500',
            'country' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:50',
        ]);

        $validated['user_id'] = auth()->id();


        $award = FapaInternationalAwards::create($validated);

        return redirect()->back()->with('success', 'Profile created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FapaInternationalAwards $fapaInternationalAwards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FapaInternationalAwards $fapaInternationalAwards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FapaInternationalAwards $fapaInternationalAwards)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'honors' => 'nullable|string|max:255',
            'club' => 'nullable|string|max:255',
            'address' => 'required|string|max:500',
            'country' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:50',
        ]);

        $award = FapaInternationalAwards::findOrFail($id);
        $award->update($validated);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FapaInternationalAwards $fapaInternationalAwards)
    {
        //
    }

    /**
     * Show the user's profile.
     */
    public function showProfile(Request $request)
    {
        $profile = \App\Models\FapaInternationalAwards::where('user_id', auth()->id())->first();

        if ($request->ajax()) {
            return response()->json($profile);
        }

        return view('pages-profile', compact('profile'));
    }
}
