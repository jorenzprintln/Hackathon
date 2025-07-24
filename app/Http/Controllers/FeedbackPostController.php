<?php

namespace App\Http\Controllers;
use App\Models\BusinessProfile;
use App\Models\FeedbackPost;

use Illuminate\Http\Request;

class FeedbackPostController extends Controller
{
    public function create()
    {
        $businesses = BusinessProfile::all();
        return view('feedback.create', compact('businesses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'business_id' => 'required|exists:business_profiles,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required|array',
            'satisfaction' => 'required|in:very_happy,happy,neutral,sad,disappointed',
            'images.*' => 'image|max:2048',
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('feedback_images', 'public');
            }
        }

        FeedbackPost::create([
            'user_id' => auth()->id(),
            'business_id' => $request->business_id,
            'title' => $request->title,
            'description' => $request->description,
            'tags' => $request->tags,
            'satisfaction' => $request->satisfaction,
            'images' => $imagePaths,
        ]);

        return redirect()->route('dashboard')->with('success', 'Feedback posted!');
    }

}
