<?php

namespace App\Http\Controllers\User;

use App\Models\Team;
use App\Models\Event;
use App\Models\Stage;
use App\Models\Header;
use App\Models\Sponsor;
use App\Models\MediaPartner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the teams.
     */
    public function dashboard()
    {
        $events = Event::first();
        $headers = Header::all();
        $mediaPartners = MediaPartner::all();
        $sponsors = Sponsor::all();
        $teams = Team::all();
        $stages = Stage::find(1);

        return view('user.dashboard', compact('teams', 'stages', 'events', 'headers', 'mediaPartners', 'sponsors'));
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
