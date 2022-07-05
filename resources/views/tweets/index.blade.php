<x-layout title="つぶやき">

    <x-header></x-header>
    <section class="mb-3">
        <form action="{{ route('tweets.create') }}" method="get" class="d-flex">
            @csrf
            <textarea name="content" id="" class="form-control mr-3 input-lg" rows="3"></textarea>
            <input type="submit" class="btn btn-primary btn-lg ml-auto mt-auto" value="つぶやく">
        </form>
        @error('content')
            <div class="m-1 text-danger font-weight-bold">{{ $message }}</div>
        @enderror
    </section>

    @forelse ($tweets as $tweet)
        <section class="p-3 border bg-light d-flex">
            <span class="mr-3">{{ $tweet->content }}</span>
            <form action="{{ route('tweets.show', $tweet) }}" method="get" class="ml-auto">
                @csrf
                <button class="btn btn-info"><span class="fui-export"></span></button>
            </form>
        </section>

    @empty
        <a>つぶやきがありません</a>
    @endforelse
</x-layout>