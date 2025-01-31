<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Team;

class ManageTeamsController extends Controller
{
    /**
     * Display a listing of the teams.
     */
    public function index()
    {
        // Get all teams
        $teams = Team::all();

        return view('admin.manage-teams.index', compact('teams'));
    }

    /**
     * Update score of the teams.
     */
    public function updateScore(Request $request, $id)
    {
        // Input Validate
        $request->validate([
            'score' => 'required|integer',
        ]);

        // Find team by ID
        $team = Team::findOrFail($id);

        // Update the score
        $team->score += $request->input('score');
        $team->save();

        return response()->json([
            'success' => true,
            'message' => 'Score updated successfully!',
            'new_score' => $team->score,
        ]);
    }

    /**
     * Display score of team.
     */
    public function getScore($id)
    {
        $team = Team::find($id);  // Pastikan ID yang diberikan valid dan tim ditemukan

        if ($team) {
            return response()->json([
                'success' => true,
                'new_score' => $team->score,  // Kirimkan skor terbaru
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Team not found',
        ]);
    }


    /**
     * Store a newly created team in storage.
     */
    public function store(Request $request)
    {
        // Input Validate
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'score' => 'required|numeric',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store the team
        $team = new Team();
        $team->name = $validated['name'];
        $team->score = $validated['score'];

        // Store the logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = date('Y-m-d') . '-' . $logo->getClientOriginalName();
            $path = $logo->storeAs('public/logos', $filename);
            $team->logo = str_replace('public/', '', $path);
        }


        $team->save();

        return redirect()->route('manage-teams.index')->with('success', 'Team successfully added.');
    }

    /**
     * Update the specified team in storage.
     */
    public function update(Request $request, $id)
    {
        // Input Validate
        $request->validate([
            'name' => 'required|string|max:255',
            'score' => 'required|integer',
            'logo' => 'nullable|image|max:2048',
        ]);

        // Find team by ID
        $team = Team::findOrFail($id);
        $team->name = $request->input('name');
        $team->score = $request->input('score');

        // If the logo is updated
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $team->logo = $logoPath;
        }

        $team->save();

        return redirect()->route('manage-teams.index')->with('success', 'Team updated successfully.');
    }


    /**
     * Remove the specified team from storage.
     */
    public function destroy($id)
    {
        // Find team by ID
        $team = Team::findOrFail($id);

        // Delete the logo from storage
        if ($team->logo) {
            $logoPath = 'public/' . $team->logo;
            if (Storage::exists($logoPath)) {
                Storage::delete($logoPath);
            }
        }

        // Delete the team
        $team->delete();

        return redirect()->route('manage-teams.index')->with('success', 'Team successfully deleted.');
    }
}
