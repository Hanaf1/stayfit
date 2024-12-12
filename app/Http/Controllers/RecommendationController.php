<?php

// app/Http/Controllers/RecommendationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nutrisi;
use Carbon\Carbon;

class RecommendationController extends Controller
{

    public function index()
    {

        return view('users.recommendations.index', [
            'nutritionRecommendations' => nutrisi::all()
        ]);
    }


    public function create()
    {
        return view('users.recommendations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        nutrisi::create($request->all());

        return redirect()->route('users.recommendations.index')->with('success', 'Recommendation created successfully.');
    }

    public function show($activityType)
    {
        $nutrisi = Nutrisi::where('activity_type', $activityType)->get();
        return view('users.recommendations.show', compact('nutrisi', 'activityType'));
    }

    public function edit($id)
    {
        $recommendation = nutrisi::findOrFail($id);
        return view('users.recommendations.edit', compact('recommendation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $recommendation = nutrisi::findOrFail($id);
        $recommendation->update($request->all());

        return redirect()->route('users.recommendations.index')->with('success', 'Recommendation updated successfully.');
    }

    public function destroy($id)
    {
        $recommendation = nutrisi::findOrFail($id);
        $recommendation->delete();

        return redirect()->route('users.recommendations.index')->with('success', 'Recommendation deleted successfully.');
    }


    // RecommendationController.php

}
