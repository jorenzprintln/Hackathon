@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Cover Photo --}}
    <div class="position-relative mb-4">
        @if($user->businessProfile && $user->businessProfile->cover_photo)
            <img src="{{ asset('storage/' . $user->businessProfile->cover_photo) }}" 
                alt="Cover Photo" class="img-fluid w-100 rounded" style="height: 300px; object-fit: cover;">
        @else
            <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" 
                style="height: 300px;">
                <h3>No Cover Photo</h3>
            </div>
        @endif

        <div class="position-absolute bottom-0 start-0 p-3 text-white bg-dark bg-opacity-50 w-100">
            <h2 class="m-0">
                {{ $user->businessProfile->business_name ?? 'Business Name' }}
            </h2>
            <p class="m-0">
                <small>{{ $user->businessProfile->business_type ?? 'Business Type' }}</small>
            </p>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="d-flex justify-content-between mb-4">
        <div>
            <a href="{{ route('tourist.feed') }}" class="btn btn-outline-secondary me-2">Tourist Spot Feed</a>
            <a href="{{ route('business.create') }}" class="btn btn-outline-primary">Set Up/Edit Profile</a>
        </div>
        <p class="text-muted mb-0 align-self-center">Welcome, {{ auth()->user()->name }}!</p>
    </div>

    {{-- Business Details --}}
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    @if($user->businessProfile)
                        <h5 class="card-title">About the Business</h5>
                        <p class="card-text">{{ $user->businessProfile->description }}</p>
                    @else
                        <p class="text-muted">No business profile set up yet.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Sidebar (Optional Info) --}}
        <div class="col-md-4">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted">Business Info</h6>
                    <ul class="list-unstyled">
                        <li><strong>Owner:</strong> {{ auth()->user()->name }}</li>
                        <li><strong>Email:</strong> {{ auth()->user()->email }}</li>
                        @if($user->businessProfile)
                            <li><strong>Type:</strong> {{ $user->businessProfile->business_type }}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
