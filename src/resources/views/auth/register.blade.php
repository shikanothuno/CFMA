@extends('layouts/layout-base')

@section('title')
    会員登録
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset("css/auth-view.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <h1 class="title-text">会員登録</h1>
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

                <button class="submit-button" type="submit">登録する</button>
        </form>
        <a class="link" href="{{ route("login") }}">ログインはこちら</a>
    </div>
</main>
@endsection

