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
    <a href="{{ route('feedback.create') }}" class="btn btn-success mt-2">Create Feedback Story</a>
</div>

@if($feedbackPosts->count())
    <h3 class="mt-5">Your Feedback Stories</h3>

    <div class="row">
        @foreach($feedbackPosts as $post)
            <div class="col-md-4 d-flex">
                <div class="card my-3 shadow-sm flex-fill">
                    {{-- Header --}}
                    <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <div class="d-flex align-items-center gap-2 flex-grow-1">
                            @if ($post->user->profile_picture)
                                <img src="{{ asset('storage/' . $post->user->profile_picture) }}" 
                                     class="rounded-circle flex-shrink-0" 
                                     style="width: 40px; height: 40px; object-fit: cover;">
                            @else
                                <img src="{{ asset('default-profile.png') }}" 
                                     class="rounded-circle flex-shrink-0" 
                                     style="width: 40px; height: 40px; object-fit: cover;">
                            @endif

                            <div>
                                <strong>{{ $post->user->name }}</strong><br>
                                <span class="text-capitalize">
                                    is feeling {{ str_replace('_', ' ', $post->satisfaction) }} in 
                                    <strong>{{ $post->business->business_name ?? 'Unknown Business' }}</strong>
                                </span>
                            </div>
                        </div>
                        <small class="text-muted flex-shrink-0">{{ $post->created_at->diffForHumans() }}</small>
                    </div>

                    <div class="card-body">
                        {{-- Tags --}}
                        @if($post->tags && count($post->tags))
                            <div class="mb-2">
                                @foreach($post->tags as $tag)
                                    <span class="badge bg-primary me-1">{{ ucfirst($tag) }}</span>
                                @endforeach
                            </div>
                        @endif

                        {{-- Title (bold) --}}
                        <h5 class="card-title fw-bold">{{ $post->title }}</h5>

                        {{-- Description (normal text) --}}
                        <p class="card-text">{{ $post->description }}</p>

                        {{-- Images preview --}}
                        @if($post->images && count($post->images) > 0)
                            <div class="d-flex gap-2 mt-3" style="overflow-x: auto; scrollbar-width: thin; -webkit-overflow-scrolling: touch;">
                                @foreach($post->images as $imgPath)
                                    <img 
                                        src="{{ asset('storage/' . $imgPath) }}" 
                                        class="rounded" 
                                        style="height: 120px; flex-shrink: 0; object-fit: cover; cursor: pointer;"
                                        alt="Feedback image"
                                        onclick="window.open('{{ asset('storage/' . $imgPath) }}', '_blank')"
                                    >
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="text-muted mt-5">You haven’t posted any feedback yet.</p>
@endif

@endsection
