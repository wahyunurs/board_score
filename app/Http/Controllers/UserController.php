<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the teams.
     */
    public function dashboard()
    {
        $teams = Team::all();
        return view('user.dashboard', compact('teams'));
    }

    /**
     * Display score of team.
     */
    public function getScore($teamId)
    {
        // Ambil tim berdasarkan ID
        $team = Team::find($teamId);

        // Pastikan tim ditemukan, kemudian kirimkan skor terbaru
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
