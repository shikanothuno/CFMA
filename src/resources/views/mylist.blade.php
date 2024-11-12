<x-layout title="マイリスト" css="css/mylist.css">
    <main>
        <div class="container">
            <div class="page-list">
                <p class="nav-text "><a class="link" href="{{ route('items.list') }}">おすすめ</a></p>
                <p class="nav-text currently-selected">マイリスト</p>
            </div>
            <div class="black-line"></div>
            <div class="item-cards">
                @foreach ($favorites as $favorite)
                    <a class="item-detail-link" href="{{ route('item.detail', $favorite->pivot->item_id) }}">
                        <img class="item-img" src="{{ asset($favorite->image->image_url) }}" alt=""></a>
                @endforeach
            </div>

        </div>
    </main>
</x-layout>
