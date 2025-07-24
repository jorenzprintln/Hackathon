<?php

namespace App\Http\Controllers;
use App\Models\FeedbackPost;
use App\Models\BusinessProfile;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user()->load('businessProfile'); // Works for both roles

        if ($user->role === 'traveller') {
            $feedbackPosts = FeedbackPost::where('user_id', $user->id)->latest()->get();
            return view('dashboards.traveller', compact('user', 'feedbackPosts'));
        } elseif ($user->role === 'business') {
            return view('dashboards.business', compact('user'));
        }

        abort(403, 'Unauthorized');
        }


    public function touristFeed()
    {
        // You can pass top ranked tourist spots or search results here
        return view('dashboards.tourist-feed');
    }
    

}
