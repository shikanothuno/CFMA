<x-layout title="商品一覧" css="css/item-list.css">
    <main>
        <div class="container">
            <div class="page-list">
                <p class="nav-text currently-selected">おすすめ</p>
                <p class="nav-text">
                    <a class="link" href="{{ route("items.mylist") }}">マイリスト</a>
                </p>
                
                @auth
                    @if (Auth::user()->is_admin)
                        <p class="nav-text">
                            <a class="link" href="{{ route('admin.page') }}">管理者画面</a>
                        </p>
                    @endif
                @endauth

            </div>
            <div class="black-line"></div>
            <div class="item-cards">
                @foreach ($items as $item)
                    <a class="item-detail-link" href="{{ route("item.detail", $item) }}">
                        <img class="item-img" src="{{ asset($item->image->image_url) }}" alt=""></a>
                @endforeach
            </div>

        </div>
    </main>
</x-layout>



