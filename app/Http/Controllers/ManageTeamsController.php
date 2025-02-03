<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $team = Team::find($id);

        if ($team) {
            return response()->json([
                'success' => true,
                'new_score' => $team->score,
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
            'logo' => 'nullable|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Store the logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = date('Y-m-d-') . $logo->getClientOriginalName();
            $path = 'logos/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($logo));
        }

        // Create new team
        Team::create([
            'name' => $request->name,
            'score' => $request->score,
            'logo' => $filename ?? null,
        ]);

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
            'logo' => 'nullable|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Find team by ID
        $team = Team::findOrFail($id);
        $newLogo = $team->logo;

        // If the logo is updated
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = date('Y-m-d-') . $logo->getClientOriginalName();
            $path       = 'logos/' . $filename;

            // Store the new logo
            Storage::disk('public')->put($path, file_get_contents($logo));

            // Delete the logo from storage
            if ($team->logo) {
                Storage::delete('public/logos/' . $team->logo);
            }

            $newLogo = $filename;
        }

        // Find team by ID
        Team::findOrFail($id)->update([
            'name' => $request->name,
            'score' => $request->score,
            'logo' => $newLogo,
        ]);

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
            Storage::delete('public/logos/' . $team->logo);
        }

        // Delete the team
        $team->delete();

        return redirect()->route('manage-teams.index')->with('success', 'Team successfully deleted.');
    }
}
