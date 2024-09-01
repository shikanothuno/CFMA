<x-layout title="購入画面" css="css/item-purchase.css">
    <main>
        <div class="container">
            <div class="item-detail-and-setting-card">
                <img class="item-img" src="{{ asset($item->image->image_url) }}" alt="">
                <h3 class="item-name">{{ $item->item_name }}</h3>
                <p class="item-price">{{ "￥" . number_format($item->item_price) }}</p>
                <div class="payment-method">
                    <h4 class="title">支払方法</h4>
                    <a class="link" href="">変更する</a>
                </div>
                <div class="shipping-address">
                    <h4 class="title">配送先</h4>
                    <a class="link" href="">変更する</a>
                </div>
            </div>
            <div class="purchase-detail-card">
                <table>
                    <tr>
                        <th>商品代金</th>
                        <th>{{ "￥" . number_format($item->item_price) }}</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>支払金額</th>
                        <th>{{ "￥" . number_format($item->item_price) }}</th>
                    </tr>
                    <tr>
                        <th>支払方法</th>
                        <th></th>
                    </tr>
                </table>
                <a class="purchase-button" href="">購入する</a>
            </div>
        </div>
    </main>
</x-layout>