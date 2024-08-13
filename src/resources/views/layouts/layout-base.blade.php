<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset("css/sanitize.css") }}">
        <link rel="stylesheet" href="{{ asset("css/layout-base.css") }}">
        @yield('css')
    </head>
    <body>
        <header class="header">
            <img class="logo" src="{{ asset("/images/logo.svg") }}" alt="">
        </header>
        @yield('content')
    </body>



</html>
