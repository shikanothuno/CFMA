@extends('layouts/layout-base')

@section('title')
    商品一覧
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset("css/item-list.css") }}">
@endsection

@section('content')
<main>
    <div class="container">
        <div class="page-list">
            <p class="nav-text currently-selected">おすすめ</p>
            <p class="nav-text">
                <a class="link" href="{{ route("items.mylist") }}">マイリスト</a></p>
        </div>
        <div class="black-line"></div>
        <div class="item-cards">
            @foreach ($items as $item)
            <a class="item-detail-link" href="{{ route("item.detail", $item->id) }}">
                <img class="item-img" src="{{ asset($item->image->image_url) }}" alt=""></a>
            @endforeach
        </div>

    </div>
</main>
@endsection

