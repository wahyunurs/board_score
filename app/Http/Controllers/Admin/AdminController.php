<?php

namespace App\Http\Controllers\Admin;


use App\Models\Team;
use App\Models\User;
use App\Models\Stage;
use App\Models\Sponsor;
use App\Models\MediaPartner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // View to show dashboard
    public function dashboard()
    {
        $userCount = User::count();
        $teamCount = Team::count();
        $mediaPartnerCount = MediaPartner::count();
        $sponsorCount = Sponsor::count();

        return view(
            'admin.dashboard',
            compact(
                'userCount',
                'teamCount',
                'mediaPartnerCount',
                'sponsorCount'
            )
        );
    }
}
