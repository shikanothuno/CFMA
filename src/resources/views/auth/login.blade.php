@extends('layouts/layout-base')

@section('title')
    ログイン
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset("css/auth-view.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        @foreach ($errors->all() as $error)
            <li>{{ $erorr }}</li>
        @endforeach
        <h1 class="title-text">ログイン</h1>
        <form action="{{ route("login") }}" method="POST">
                @csrf
                <div class="input-form">
                    <label class="label" for="email">メールアドレス</label>
                    <input class="input" id="email" type="email">
                </div>

                <div class="input-form">
                    <label class="label" for="password">パスワード</label>
                    <input class="input" id="password" type="password">
                </div>

                <button class="submit-button" type="submit">ログインする</button>
        </form>
        <a class="link" href="{{ route("register") }}">会員登録はこちら</a>
    </div>
</main>
@endsection

