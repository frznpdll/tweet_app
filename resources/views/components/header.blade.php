<header class="d-flex">
    <h1 class="mb-3 pb-3">つぶやきアプリ！</h1>
    <form action="{{ route('tweets.index') }}" method="get" class="ml-auto my-auto">
        @csrf
        <input type="submit" class="btn btn-default btn-lg " value="一覧へ">
    </form>
</header>
