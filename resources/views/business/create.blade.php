@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Business Profile</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('business.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Business Name</label>
            <input type="text" name="business_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Business Type</label>
            <select name="business_type" class="form-control" required>
                <option value="">-- Select Type --</option>
                <option value="Resort">Resort</option>
                <option value="Hotel">Hotel</option>
                <option value="Restaurant">Restaurant</option>
                <option value="Adventure Park">Adventure Park</option>
                <option value="Eco-tourism">Eco-tourism</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Cover Photo</label>
            <input type="file" name="cover_photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save Business Profile</button>
    </form>

</div>
@endsection
