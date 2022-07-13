@props([
    'images' => []
])

@if(count($images) > 0)
    @foreach ($images as $image)
        <img src="{{ asset('storage/images' . $image->name) }}" alt="{{ $image->name }}">
    @endforeach
@endif