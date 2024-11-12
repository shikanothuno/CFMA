<x-layout title="マイページ" css="css/mypage.css">
    <main>
        <div class="container">
            <div class="user-profile">
                <div class="user-name-and-thumbnail">
                    <img class="thumbnail"
                        src="{{ is_null(Auth::user()->image) ? asset('images/default.png') : asset(Auth::user()->image->image_url) }}"
                        alt="">
                    <h3 class="name">{{ is_null(Auth::user()->name) ? 'anonymous' : Auth::user()->name }}</h3>
                </div>
                <a class="profile-link" href="{{ route('profile.setting.view') }}">プロフィールを編集</a>
            </div>
            <div class="listing-and-purchase">
                @if ($is_listing)
                    <a class="listing-and-purchase-link selected-link" href="{{ route('mypage.listing') }}">出品した商品</a>
                    <a class="listing-and-purchase-link" href="{{ route('mypage.purchase') }}">購入した商品</a>
                @else
                    <a class="listing-and-purchase-link" href="{{ route('mypage.listing') }}">出品した商品</a>
                    <a class="listing-and-purchase-link selected-link" href="{{ route('mypage.purchase') }}">購入した商品</a>
                @endif
            </div>
            <div class="layout-bar"></div>
            <div class="item-cards">
                @foreach ($items as $item)
                    <a class="item-detail-link" href="{{ route('item.detail', $item) }}">
                        <img class="item-img" src="{{ asset($item->image->image_url) }}" alt=""></a>
                @endforeach
            </div>
        </div>
    </main>
</x-layout>
