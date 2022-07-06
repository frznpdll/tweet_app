<x-layout title="つぶやき編集">
    <x-header>
        <x-elements.show-button>ml-auto</x-elements.show-button>
    </x-header>
    <form action="{{ route('tweets.update', $tweet) }}" method="post" class="ml-auto d-flex">
        @method('PATCH')
        @csrf
        <textarea name="content" id="" class="form-control mr-3 input-lg" rows="3">{{ $tweet->content }}</textarea>
        <input type="submit" class="btn btn-primary btn-lg ml-auto mt-auto" value="編集">
    </form>
</x-layout>