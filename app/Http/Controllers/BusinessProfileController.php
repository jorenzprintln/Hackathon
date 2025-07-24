<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessProfile;
use Illuminate\Support\Facades\Auth;

class BusinessProfileController extends Controller
{
    public function create()
    {
        return view('business.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'business_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $coverPath = null;
        if ($request->hasFile('cover_photo')) {
            $coverPath = $request->file('cover_photo')->store('covers', 'public');
        }

        BusinessProfile::create([
            'user_id' => Auth::id(),
            'business_name' => $request->business_name,
            'business_type' => $request->business_type,
            'description' => $request->description,
            'cover_photo' => $coverPath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Business profile created!');
    }
    // app/Http/Controllers/DashboardController.php
}

