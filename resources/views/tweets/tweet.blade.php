<x-layout title="つぶやく">
    <x-header>
        <x-elements.button></x-elements.button>
    </x-header>
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
</x-layout>