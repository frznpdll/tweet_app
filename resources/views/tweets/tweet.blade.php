<x-layout title="つぶやく">
    <x-header>
        <x-elements.show-button>ml-auto</x-elements.show-button>
    </x-header>
    <section class="mb-3">
        <form action="{{ route('tweets.create') }}" method="post" class="" enctype="multipart/form-data">
            @csrf
            <textarea name="content" class="form-control mr-3 input-lg" id="text" rows="3"></textarea>
            @error('content')
                <div class="m-1 text-danger font-weight-bold">{{ $message }}</div>
            @enderror
            <div class="custom-file mt-3 w-50">
                <label class="custom-file-label" for="inputFile">画像を選択</label>
                <input type="file" class="custom-file-input" name="images[]" id="inputFile">
            </div>
            <div class="custom-file mt-3 w-50">
                <label class="custom-file-label" for="inputFile">画像を選択</label>
                <input type="file" class="custom-file-input" name="images[]" id="inputFile">
            </div>
            <div class="custom-file mt-3 w-50">
                <label class="custom-file-label" for="inputFile">画像を選択</label>
                <input type="file" class="custom-file-input" name="images[]" id="inputFile">
            </div>
            <div class="custom-file mt-3 w-50">
                <label class="custom-file-label" for="inputFile">画像を選択</label>
                <input type="file" class="custom-file-input" name="images[]" id="inputFile">
            </div>
            <input type="submit" class="btn btn-primary btn-lg d-block ml-auto mt-3" value="つぶやく">
        </form>

    </section>
</x-layout>