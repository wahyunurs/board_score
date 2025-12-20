<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stage;

class ManageStageController extends Controller
{
    /**
     * Display a listing of the stages.
     */
    public function index()
    {
        $stages = Stage::all();
        return view('admin.manage-stages.index', compact('stages'));
    }

    /**
     * Update the stage.
     */
    public function update(Request $request, $id)
    {
        // Input Validate
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        // Find stage by ID
        Stage::findOrFail($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('manage-stages.index')->with('success', 'Stage updated successfully.');
    }
}
