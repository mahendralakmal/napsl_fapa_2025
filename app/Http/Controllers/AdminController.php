<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clentCount = \App\Models\User::where('role', 'client')->count();
        $entriesCount = \App\Models\ExhibitionEntries::count();
        $monochromeCount = \App\Models\ExhibitionEntries::where('section', 'Open Monochrome')->count();
        $colorCount = \App\Models\ExhibitionEntries::where('section', 'Open Color')->count();
        // $clients = \App\Models\User::with('fapa')->where('role', 'client')->get();
        $clients = \App\Models\User::with('fapa')
            ->where('role', 'client')
            ->whereHas('fapa', function($q) {
                $q->whereDoesntHave('payments', function($q2) {
                    $q2->where('status', 'paid');
                });
            })
            ->get();
        $paidCount = \App\Models\Payment::where('status', 'paid')->count();
        $unpaidCount = $clentCount - $paidCount;
        $users = \App\Models\User::all();

        return view('admin.index', compact('users','clentCount','entriesCount','monochromeCount','colorCount','clients','paidCount','unpaidCount')); // Assuming you have an admin index view
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
