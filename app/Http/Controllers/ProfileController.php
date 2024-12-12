<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth; // Use Auth here
use App\Models\DetailsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Assuming you have a 'detailsUser' relationship in your User model
        $profile = $user->detailsUser;

        return view('users.profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Validate the request data
        $request->validate([
            'gender' => 'required|in:Male,Female',
            'birth' => 'required|date',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed image types and size
        ]);

        // Update the user's profile if it exists
        if ($user->detailsUser) {
            $user->detailsUser->update([
                'gender' => $request->input('gender'),
                'birth' => $request->input('birth'),
            ]);

            // Handle profile photo upload
            if ($request->hasFile('photo')) {
                // Delete previous photo if it exists
                if ($user->detailsUser->photo) {
                    Storage::delete($user->detailsUser->photo);
                }

                // Store the new photo
                $photoPath = $request->file('photo')->store('post-images');
                $user->detailsUser->photo = $photoPath;
                $user->detailsUser->save();
            }
        }

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
