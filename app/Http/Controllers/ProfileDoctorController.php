<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ProfileDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Assuming you have a 'detailsUser' relationship in your User model
        $profile = $user->detaildokter;

        return view('doctor.profiledoc.index', compact('profile'));
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
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Validate the request data
        $request->validate([
            'gender' => 'required|in:Male,Female',
            'gelar' => 'required|string',
            'alamat_praktek' => 'required|string',
            'spesialisasi' => 'required|string',
            'pengalaman_kerja' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed image types and size
        ]);

        // Create the user's profile if it doesn't exist
        if (!$user->detaildokter) {
            $user->detaildokter->create([
                'gender' => $request->input('gender'),
                'gelar' => $request->input('gelar'),
                'alamat_praktek' => $request->input('alamat_praktek'),
                'spesialisasi' => $request->input('spesialisasi'),
                'pengalaman_kerja' => $request->input('pengalaman_kerja'),
            ]);
        }

        // Handle profile photo upload
        if ($request->hasFile('photo')) {
            // Store the new photo
            $photoPath = $request->file('photo')->store('post-images');
            $user->detaildokter->photo = $photoPath;
            $user->detaildokter->save();
        }

        return redirect()->route('profiledoc.index')->with('success', 'Profile created/updated successfully');
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
    public function update(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Validate the request data
        $request->validate([
            'gender' => 'required|in:Male,Female',
            'gelar' => 'required|string',
            'alamat_praktek' => 'required|string',
            'spesialisasi' => 'required|string',
            'pengalaman_kerja' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed image types and size
        ]);

        // Check if detailsDoc exists for the user
        if ($user->detaildokter) {
            // If detaildokter exists, update the profile
            $user->detaildokter->update([
                'gender' => $request->input('gender'),
                'gelar' => $request->input('gelar'),
                'alamat_praktek' => $request->input('alamat_praktek'),
                'spesialisasi' => $request->input('spesialisasi'),
                'pengalaman_kerja' => $request->input('pengalaman_kerja'),
            ]);

            // Handle profile photo upload
            if ($request->hasFile('photo')) {
                // Delete previous photo if it exists
                if ($user->detaildokter->photo) {
                    Storage::delete($user->detaildokter->photo);
                }

                // Store the new photo
                $photoPath = $request->file('photo')->store('post-images');
                $user->detaildokter->photo = $photoPath;
                $user->detaildokter->save();
            }

            return redirect()->route('profiledoc.index')->with('success', 'Profile updated successfully');
        } else {
            // If detaildokter does not exist, create a new profile
            $user->detaildokter->create([
                'gender' => $request->input('gender'),
                'gelar' => $request->input('gelar'),
                'alamat_praktek' => $request->input('alamat_praktek'),
                'spesialisasi' => $request->input('spesialisasi'),
                'pengalaman_kerja' => $request->input('pengalaman_kerja'),
            ]);

            // Handle profile photo upload for the newly created record
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('post-images');
                $user->detaildokter->photo = $photoPath;
                $user->detaildokter->save();
            }

            return redirect()->route('profiledoc.index')->with('success', 'Profile created successfully');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
