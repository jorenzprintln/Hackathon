@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Write Your Travel Feedback</h2>
    <form action="{{ route('feedback.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="business_id" class="form-label">Select Tourist Business</label>
            <select name="business_id" class="form-select" required>
                <option disabled selected>-- Choose a Place --</option>
                @foreach($businesses as $biz)
                    <option value="{{ $biz->id }}">{{ $biz->business_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Story Title</label>
            <input type="text" class="form-control" name="title" placeholder="e.g. My Peaceful Stay in Bohol" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tags</label><br>
            @foreach(['cleanliness', 'accommodation', 'food', 'services'] as $tag)
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="tags[]" value="{{ $tag }}" class="form-check-input" id="tag-{{ $tag }}">
                    <label for="tag-{{ $tag }}" class="form-check-label">{{ ucfirst($tag) }}</label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label class="form-label">Your Feedback</label>
            <textarea name="description" rows="5" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Upload Images</label>
            <input type="file" name="images[]" class="form-control" id="imageInput" multiple>
            <div id="previewContainer" class="mt-3 d-flex flex-wrap gap-2"></div>
        </div>


        <div class="mb-3">
            <label class="form-label">Satisfaction</label>
            <select name="satisfaction" class="form-select" required>
                <option value="very_happy">😁 Very Happy</option>
                <option value="happy">😊 Happy</option>
                <option value="neutral">😐 Neutral</option>
                <option value="sad">☹️ Sad</option>
                <option value="disappointed">😡 Disappointed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Post Feedback</button>
    </form>
</div>

@push('scripts')
<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const preview = document.getElementById('previewContainer');
        preview.innerHTML = ''; // Clear previous previews

        Array.from(event.target.files).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-thumbnail');
                    img.style.width = '120px';
                    img.style.height = '120px';
                    preview.appendChild(img);
                }

                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endpush

@endsection
