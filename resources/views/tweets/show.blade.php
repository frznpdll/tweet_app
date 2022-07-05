<x-layout title="つぶやき表示">
    <x-header></x-header>
    <section class="p-3 border bg-light d-flex">
        <span class="mr-3">{{ $tweet->content }}</span>
        <form action="{{ route('tweets.edit', $tweet) }}" method="post" class="ml-auto">
            @csrf
            <button class="btn btn-info"><span>編集</span></button>
        </form>
        <form action="{{ route('tweets.delete', $tweet) }}" method="post" class="ml-3" id="delete">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger"><span>削除</span></button>
        </form>
    </section>
</x-layout>