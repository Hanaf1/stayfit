<?php

namespace App\Http\Controllers;

use App\Models\nutrisi;
use Illuminate\Http\Request;

class NutrisiSettingController extends Controller
{
    public function index()
    {
        return view('admin.nutrisi.index', [
            'nutritionRecommendations' => nutrisi::all()
        ]);
    }

    public function create()
    {
        return view('admin.nutrisi.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'makanan' => 'required',
            'minuman' => 'required',
            'activity_type' => 'required',
            'day' => 'required',
        ]);

        // Create a new Nutrisi instance
        Nutrisi::create([
            'makanan' => $request->makanan,
            'minuman' => $request->minuman,
            'activity_type' => $request->activity_type,
            'day' => $request->day,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Nutrisi created successfully');
    }

    public function edit($activityType)
    {
        // Find the Nutrisi model by activity_type
        $nutrisi = Nutrisi::where('activity_type', $activityType)->first();

        return view('admin.nutrisi.edit', compact('nutrisi'));
    }

    public function update(Request $request, nutrisi $nutrisi)
    {
        // Validate the form data
        $request->validate([
            'makanan' => 'required',
            'minuman' => 'required',
            'day' => 'required',
        ]);

        // Update the Nutrisi data
        $nutrisi->update([
            'makanan' => $request->makanan,
            'minuman' => $request->minuman,
            'day' => $request->day,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Nutrisi updated successfully');
    }

    public function destroy(nutrisi $nutrisi)
    {
        // Delete the nutrisi record
        $nutrisi->delete();

        // Redirect to the index route
        return redirect()->back()->with('success', 'delete succefully');
    }

    public function show($activityType)
    {
        $nutrisi = Nutrisi::where('activity_type', $activityType)->get();

        return view('admin.nutrisi.show', compact('nutrisi', 'activityType'));
    }

}
