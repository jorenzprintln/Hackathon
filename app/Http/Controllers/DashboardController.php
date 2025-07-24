<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        if ($user->role === 'traveller') {
            return view('dashboards.traveller');
        } elseif ($user->role === 'business') {
            return view('dashboards.business');
        }

        // Optional fallback
        abort(403, 'Unauthorized');
    }

    public function touristFeed()
    {
        // You can pass top ranked tourist spots or search results here
        return view('dashboards.tourist-feed');
    }
}
