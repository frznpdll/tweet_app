<x-layout title="つぶやき">

    <x-header>
        @auth
        <form action="{{ route('tweets.add') }}" method="get" class="ml-auto my-auto">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg">
                <span class="fui-plus"></span>
            </button>
        </form>
        @endauth
    </x-header>

    @forelse ($tweets as $tweet)
        <x-elements.post>
            <x-slot name="acount">{{ $tweet->user->name }}</x-slot>
            <x-slot name="tweet">{{ $tweet->content }}</x-slot>
            <form action="{{ route('tweets.show', $tweet) }}" method="get" class="ml-auto">
                @csrf
                <button class="btn btn-info"><span class="fui-export"></span></button>
            </form>
        </x-elements.post>

    @empty
        <a>つぶやきがありません</a>
    @endforelse
</x-layout>