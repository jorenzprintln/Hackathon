@extends('layouts.app')

@section('content')
    <h2>Traveller Dashboard</h2>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    <a href="{{ route('tourist.feed') }}">View Tourist Spot Feed</a>
@endsection
