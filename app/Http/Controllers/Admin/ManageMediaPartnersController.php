<?php

namespace App\Http\Controllers\Admin;

use App\Models\MediaPartner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ManageMediaPartnersController extends Controller
{
    /**
     * Display a listing of the media partners.
     */
    public function index()
    {
        $mediaPartners = MediaPartner::all();

        return view('admin.manage-media-partners.index', compact('mediaPartners'));
    }

    /**
     * Store a newly created media partner in storage.
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
            $path = 'images/media-partner/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($logo));
        }

        // Create new media partner
        MediaPartner::create([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $filename ?? null,
        ]);

        return redirect()->route('manage-media-partners.index')->with('success', 'Media Partner successfully added.');
    }

    /**
     * Update the specified media partner in storage.
     */
    public function update(Request $request, $id)
    {
        // Input Validate
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'logo' => 'nullable|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        // Find media partner by ID
        $mediaPartner = MediaPartner::findOrFail($id);
        $newLogo = $mediaPartner->logo;

        // If the logo is updated
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = date('Y-m-d-') . $logo->getClientOriginalName();
            $path = 'images/media-partner/' . $filename;

            // Store the new logo
            Storage::disk('public')->put($path, file_get_contents($logo));

            // Delete the old logo from storage
            if ($mediaPartner->logo) {
                Storage::delete('public/images/media-partner/' . $mediaPartner->logo);
            }

            $newLogo = $filename;
        }

        // Update media partner
        MediaPartner::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $newLogo,
        ]);

        return redirect()->route('manage-media-partners.index')->with('success', 'Media Partner updated successfully.');
    }

    /**
     * Remove the specified media partner from storage.
     */
    public function destroy($id)
    {
        // Find media partner by ID
        $mediaPartner = MediaPartner::findOrFail($id);

        // Delete the logo from storage
        if ($mediaPartner->logo) {
            Storage::delete('public/images/media-partner/' . $mediaPartner->logo);
        }

        // Delete the media partner
        $mediaPartner->delete();

        return redirect()->route('manage-media-partners.index')->with('success', 'Media Partner successfully deleted.');
    }
}
