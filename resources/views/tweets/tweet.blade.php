<x-layout title="つぶやく">
    <x-header>
        <x-elements.show-button>ml-auto</x-elements.show-button>
    </x-header>
    <section class="mb-3">
        <form action="{{ route('tweets.create') }}" method="get" class="d-flex">
            @csrf
            <textarea name="content" class="form-control mr-3 input-lg" id="text" rows="3"></textarea>
            <input type="submit" class="btn btn-primary btn-lg ml-auto mt-auto" value="つぶやく">
        </form>
        @error('content')
            <div class="m-1 text-danger font-weight-bold">{{ $message }}</div>
        @enderror
    </section>
</x-layout>