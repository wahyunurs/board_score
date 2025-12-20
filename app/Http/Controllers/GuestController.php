<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Header;
use App\Models\Sponsor;
use App\Models\MediaPartner;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $events = Event::first();
        $headers = Header::all();
        $mediaPartners = MediaPartner::all();
        $sponsors = Sponsor::all();

        return view('guest.index', compact('events', 'headers', 'mediaPartners', 'sponsors'));
    }
}
