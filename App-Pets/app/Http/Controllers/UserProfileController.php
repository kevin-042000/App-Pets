<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserProfileRequest;
use App\Models\UserProfile;
use Illuminate\View\view;
use Illuminate\http\RedirectResponse;

class UserProfileController extends Controller
{
    public function index(): view
    {
        $UserProfile = UserProfile::all();
        return view('pages.user-profile', compact('UserProfile'));
    }

    public function store(UserProfileRequest $request): RedirectResponse
    {
        UserProfile::create([
            'bio' => $request->bio,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate
        ]);        
        return redirect()->route('user-profile.index');
    }

    // public function edit(UserProfile $pet): View
    // {
    //     return view('function.edit', compact('pet'));       
    // }

    // public function update(UserProfileRequest $request, UserProfile $pet): RedirectResponse
    // {
    //     $pet->update($request->all());
    //     return redirect()->route('lost-pets.index');
    // }

    // public function destroy(LostPet $pet): RedirectResponse
    // {
    // $pet->delete();
    // return redirect()->route('lost-pets.index');
    // }
}
