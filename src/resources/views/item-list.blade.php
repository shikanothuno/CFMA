@extends('layouts/layout-base')

@section('title')
    ログイン
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset("css/item-list.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        @foreach ($items as $item)

        @endforeach
    </div>
</main>
@endsection

