<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileRequest;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('pages-profile');
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
    public function store(UserProfileRequest $request): RedirectResponse
    {
        try {
            UserProfile::create([
                'user_id' => auth()->user()->id,
                'section' => $request['section'],
                'first_name' => $request['first_name'],
                'surname' => $request['surname'],
                'telephone' => $request['telephone'],

                'age' => $request['age'],
                'grade' => $request['grade'],
                'school' => $request['school'],

                'year_of_study' => $request['year_of_study'],
                'registration_number' => $request['registration_number'],
                'membership_number' => $request['membership_number'],
            ]);
            return redirect('/upload_image');
        } catch (\Throwable $th) {
            return response()->json(['message' => 'something went wrong...!', 'status' => false], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
