<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title }}</title>
        <link rel="stylesheet" href="{{ asset("css/sanitize.css") }}">
        <link rel="stylesheet" href="{{ asset("css/layout-base.css") }}">
        @if ($css)
            <link rel="stylesheet" href="{{ asset($css) }}">
        @endif
    </head>
    <body>
        <header class="header">
            <img class="logo" src="{{ asset("/images/logo.svg") }}" alt="">
            <form id="search-form" action="{{ route('items.list') }}">
                <input class="search-input" name="keyword" type="text" onchange="document.getElementById('search-form').submit()" placeholder="何をお探しですか?">
            </form>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">
                        ログアウト
                    </button>
                </form>
                <a class="header-link" href="">マイページ</a>
            @endauth
            @guest
                <a class="header-link" href="{{route('login')}}">ログイン</a>
                <a class="header-link" href="{{route('register')}}">会員登録</a>
            @endguest
            <a class="listing" href="">出品</a>
        </header>
        {{ $slot }}
    </body>
</html>
