@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Traveller Dashboard</h2>
    <p>Welcome, {{ $user->name }}!</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Profile Picture Display --}}
    <div class="mb-4 text-center">
        @if($user->profile_picture)
            <img src="{{ asset('storage/' . $user->profile_picture) }}"
                 alt="Profile Picture"
                 class="rounded-circle img-fluid border"
                 style="width: 150px; height: 150px; object-fit: cover;">
        @else
            <p>No profile picture uploaded.</p>
        @endif
    </div>

    {{-- Profile Picture Upload Form --}}
    <form action="{{ route('profile.picture.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="profile_picture" class="form-label">Upload New Profile Picture:</label>
            <input type="file" name="profile_picture" id="profile_picture" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update Picture</button>
    </form>

    <div class="card mt-4">
        <div class="card-header">Your Info</div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Joined:</strong> {{ $user->created_at->format('F j, Y') }}</p>
        </div>
    </div>

    <a href="{{ route('tourist.feed') }}" class="btn btn-secondary mt-3">View Tourist Spot Feed</a>
</div>
@endsection
