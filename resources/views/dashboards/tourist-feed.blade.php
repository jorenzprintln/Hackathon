@extends('layouts.app')

@section('content')
    <h2>Top Tourist Spots</h2>
    <p>This is the shared public feed. Ranking & search goes here.</p>

    <!-- Example content -->
    <ul>
        <li>🏝️ Boracay - Beach • 4.9⭐</li>
        <li>🌋 Mayon Volcano - Nature • 4.8⭐</li>
        <li>🏰 Intramuros - Heritage • 4.7⭐</li>
        <a href="{{ route('tourist.feed') }}">View Tourist Spot Feed</a>
    </ul>
@endsection
