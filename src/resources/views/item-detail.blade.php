<x-layout title="商品詳細" css="css/item-detail.css">
    <main>
        <div class="container">
            <div class="item-img-card">
                <img class="item-img" src="{{ $item->image->image_url }}" alt="">
            </div>
            <div class="item-detail-card">
                <h2 class="item-name">{{ $item->item_name }}</h2>
                <h4 class="item-brand-name">{{ $item->item_brand_name }}</h4>
                <h3 class="item-price">{{ "￥" . number_format($item->item_price) . "(値段)"}}</h3>
                <div class="favorite-and-comment">
                    <table>
                        <tr>
                            <td class="favorite-and-comment__td"><a href=""
                            onclick="event.preventDefault();
                            document.getElementById('toggle-favorite-form').submit()"><img class="icon" 
                            src="{{ asset("images/favorite.png") }}" alt=""></a></td>
                            <form id="toggle-favorite-form" method="POST" 
                            action="{{ route('toggle.favorite',$item) }}"
                            style="display: none;">@csrf</form>
                            <td class="favorite-and-comment__td"><a href=""><img class="icon" 
                            src="{{ asset("images/comment.png") }}" alt=""></a></td>
                        </tr>
                        <tr>
                            <td class="favorite-and-comment__td">
                                <p class="value">{{ count($item->favorites) }}</p></td>
                            <td class="favorite-and-comment__td">
                                <p class="value">{{ count($item->comments) }}</p></td>
                        </tr>
                    </table>       
                </div>
                <a class="purchase-button" href="{{ route("item.purchase", $item) }}">購入する</a>
                <h3 class="item-description-text">商品説明</h3>
                <p class="item-descriotion">{{ $item->item_description }}</p>
                <h3 class="item-info-text">商品の情報</h3>
                <table>
                    <tr>
                        <td><h5 class="item-category">カテゴリー</h5></td>
                        <td>
                            <div class="categories">
                                @foreach ($item->categories as $category)
                                    <span class="category-text">{{ $category->category_name }}</span>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><h5 class="item-status-text">商品の状態</h5></td>
                        <td><p class="item-status">{{ $item->item_status->item_status_name }}</p></td>
                    </tr>
                </table>

            </div>

        </div>
    </main>
</x-layout>
