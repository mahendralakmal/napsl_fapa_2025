<?php

namespace App\Http\Controllers;

use App\Models\ExhibitionEntries;
use App\Models\Fapa2025ExhibitionSummary;
use App\Models\User;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = ExhibitionEntries::select('section')
        ->groupBy('section')
        ->pluck('section');
        $entries = Fapa2025ExhibitionSummary::all();
        return view('status.index', compact('entries','sections'));
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
}
