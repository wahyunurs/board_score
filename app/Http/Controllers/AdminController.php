<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // View to show dashboard
    public function dashboard()
    {
        $userCount = User::count();
        $teamCount = Team::count();
        $stageCount = Stage::count();  

        return view('admin.dashboard', compact('userCount', 'teamCount', 'stageCount'));
    }
}
