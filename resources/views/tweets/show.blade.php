<x-layout title="つぶやき表示">
    <x-header>
        @auth
            <form action="{{ route('logout') }}" method="post" class="ml-auto my-auto">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg">
                    ログアウト
                </button>
            </form>
            <x-elements.show-button>ml-3</x-elements.show-button>
        @endauth
        @guest
            <form action="{{ route('login') }}" method="get" class="ml-auto my-auto">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg">
                    ログイン
                </button>
            </form>
            <form action="{{ route('register') }}" method="post" class="ml-3 my-auto">
                @csrf
                <button type="submit" class="btn btn-warning btn-lg">
                    会員登録
                </button>
            </form>
            <x-elements.show-button>ml-3</x-elements.show-button>
        @endguest
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