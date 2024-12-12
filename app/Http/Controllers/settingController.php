<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Show all user data
        $users = User::all();
        return view('admin.settings.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data

        $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        // Hash the password
        $hashedPassword = Hash::make($request->input('password'));

        // Create and save the new user with the hashed password
        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
        ]);

        // Redirect to the user's profile or another appropriate page
        return redirect()->back()->with('success', 'created successfully');
    }

    public function show(User $user)
    {
        // Show a specific user's details
        return view('admin.settings.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {   
        
        // Show the form to edit a specific user
        return view('admin.settings.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:0,1,2',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('settings.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('settings.index')->with('success', 'User deleted successfully!');
    }

}