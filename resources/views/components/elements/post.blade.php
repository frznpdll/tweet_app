@props([
    'name' => '',
    'tweet' => '',
    'images' => [],
])

<div class="border bg-light d-inline-block px-3 mt-3">{{ $name }}</div>
<section class="p-3 border bg-light">
    <div class="d-flex">
        <span class="mr-3">{{ $tweet }}</span>
        {{  $slot }}
    </div>
    <div class="d-flex justify-content-center">
        @if(count($images) > 0)
            @foreach ($images as $image)
            <div class="d-inline-box image-box mt-3 mr-3 bg-secondary">
                <img src="{{ asset('storage/images/' . $image->name) }}" alt="{{ $image->name }}" class="object-fit w-100">
            </div>
            @endforeach
        @endif
    </div>
</section>