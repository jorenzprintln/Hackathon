<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user()->load('businessProfile'); // This also works for travellers

        if ($user->role === 'traveller') {
            return view('dashboards.traveller', compact('user'));
        } elseif ($user->role === 'business') {
            $user->load('businessProfile');
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
