<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageSponsorsController extends Controller
{
    /**
     * Display a listing of the sponsors.
     */
    public function index()
    {
        $sponsors = Sponsor::all();

        return view('admin.manage-sponsors.index', compact('sponsors'));
    }

    /**
     * Store a newly created sponsor in storage.
     */
    public function store(Request $request)
    {
        // Input Validate
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'logo' => 'nullable|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        // Store the logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = date('Y-m-d-') . $logo->getClientOriginalName();
            $path = 'images/sponsor/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($logo));
        }

        // Create new sponsor
        Sponsor::create([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $filename ?? null,
        ]);

        return redirect()->route('manage-sponsors.index')->with('success', 'Sponsor successfully added.');
    }

    /**
     * Update the specified sponsor in storage.
     */
    public function update(Request $request, $id)
    {
        // Input Validate
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'logo' => 'nullable|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        // Find sponsor by ID
        $sponsor = Sponsor::findOrFail($id);
        $newLogo = $sponsor->logo;

        // If the logo is updated
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = date('Y-m-d-') . $logo->getClientOriginalName();
            $path = 'images/sponsor/' . $filename;

            // Store the new logo
            Storage::disk('public')->put($path, file_get_contents($logo));

            // Delete the old logo from storage
            if ($sponsor->logo) {
                Storage::delete('public/images/sponsor/' . $sponsor->logo);
            }

            $newLogo = $filename;
        }

        // Update sponsor
        Sponsor::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $newLogo,
        ]);

        return redirect()->route('manage-sponsors.index')->with('success', 'Sponsor updated successfully.');
    }

    /**
     * Remove the specified sponsor from storage.
     */
    public function destroy($id)
    {
        // Find sponsor by ID
        $sponsor = Sponsor::findOrFail($id);

        // Delete the logo from storage
        if ($sponsor->logo) {
            Storage::delete('public/images/sponsor/' . $sponsor->logo);
        }

        // Delete the sponsor
        $sponsor->delete();

        return redirect()->route('manage-sponsors.index')->with('success', 'Sponsor successfully deleted.');
    }
}
