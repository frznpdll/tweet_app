<x-layout title="つぶやき表示">
    <x-header>
        <x-elements.show-button>ml-auto</x-elements.show-button>
    </x-header>
    <div class="border bg-light d-inline-block px-3 mt-3">{{ $tweet->user->name }}</div>
    <section class="p-3 border bg-light d-flex">
        <span class="mr-3">{{ $tweet->content }}</span>
        @if(\Illuminate\Support\Facades\Auth::id() === $tweet->user_id)
            <form action="{{ route('tweets.edit', $tweet) }}" method="post" class="ml-auto">
                @csrf
                <button class="btn btn-info"><span>編集</span></button>
            </form>
            <form action="{{ route('tweets.delete', $tweet) }}" method="post" class="ml-3" id="delete">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger"><span>削除</span></button>
            </form>
        @endif
    </section>
</x-layout>