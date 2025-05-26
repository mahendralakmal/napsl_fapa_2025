<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExhibitionRequest;
use App\Http\Requests\UpdateExhibitionRequest;
use App\Models\Exhibition;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
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
    public function store(StoreExhibitionRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Exhibition $exhibition): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exhibition $exhibition): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExhibitionRequest $request, Exhibition $exhibition): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exhibition $exhibition): RedirectResponse
    {
        //
    }
}
