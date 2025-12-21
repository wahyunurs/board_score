<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Header;
use Illuminate\Http\Request;

class ManageHeadersController extends Controller
{
    // View to manage headers
    public function index()
    {
        $headers = Header::all();

        return view('admin.manage-headers.index', compact('headers'));
    }

    public function update(Request $request, $id)
    {
        // Input Validate
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string|max:500',
        ]);

        $header = Header::findOrFail($id);

        // Handle logo upload if exists
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('images/header', 'public');
            $header->logo = basename($logoPath);
        }

        // Update header details
        $header->name = $request->input('name');
        $header->description = $request->input('description');
        $header->save();

        return redirect()->route('manage-headers.index')->with('success', 'Header updated successfully.');
    }
}
