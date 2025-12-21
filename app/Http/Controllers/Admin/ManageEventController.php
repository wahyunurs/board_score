<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class ManageEventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('admin.manage-events.index', compact('events'));
    }

    public function update(Request $request, $id)
    {
        // Input Validate
        $request->validate([
            'short_title' => 'required|string|max:255',
            'long_title' => 'required|string|max:255',
            'level' => 'required|string|max:100',
            'theme' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        // Find event by ID
        Event::findOrFail($id)->update([
            'short_title' => $request->input('short_title'),
            'long_title' => $request->input('long_title'),
            'level' => $request->input('level'),
            'theme' => $request->input('theme'),
            'date' => $request->input('date'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('manage-events.index')->with('success', 'Event updated successfully.');
    }
}
