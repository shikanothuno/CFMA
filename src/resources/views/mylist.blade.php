<x-layout title="マイリスト" css="css/mylist.css">
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
</x-layout>
