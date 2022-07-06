
<form action="{{ route('tweets.index') }}" method="get" class="{{ $slot }} my-auto">
    @csrf
    <button type="submit" class="btn bg-default btn-lg">
        一覧
    </button>
</form>