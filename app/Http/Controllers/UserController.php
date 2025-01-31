<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Stage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the teams.
     */
    public function dashboard()
    {
        // Get all teams
        $teams = Team::all();
        // Find stage by ID
        $stages = Stage::find(1);

        return view('user.dashboard', compact('teams', 'stages'));
    }

    /**
     * Display score of team.
     */
    public function getScore($teamId)
    {
        // Find team by ID
        $team = Team::find($teamId);

        // If team found
        if ($team) {
            return response()->json([
                'success' => true,
                'new_score' => $team->score, // Skor terbaru tim
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Team not found',
        ]);
    }
}
