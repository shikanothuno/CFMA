<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title }}</title>
        <link rel="stylesheet" href="{{ asset("css/sanitize.css") }}">
        <link rel="stylesheet" href="{{ asset("css/plane-layout.css") }}">
        @if ($css)
            <link rel="stylesheet" href="{{ asset($css) }}">
        @endif
    </head>
    <body>
        <header class="header">
        </header>
        {{ $slot }}
    </body>
</html>
