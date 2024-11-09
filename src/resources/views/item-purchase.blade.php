<x-layout title="購入画面" css="css/item-purchase.css">
    <main>
        <div class="container">
            <div class="item-detail-and-setting-card">
                <div class="item-img-and-name-and-price">
                    <div class="item-img__div">
                        <img class="item-img" src="{{ asset($item->image->image_url) }}" alt="">
                    </div>
                    <div class="item-name-and-price">
                        <h3 class="item-name">{{ $item->item_name }}</h3>
                        <p class="item-price">{{ '￥' . number_format($item->item_price) }}</p>
                    </div>
                </div>
                <div class="payment-method">
                    <h4 class="title">支払方法</h4>
                    <a class="link" href="{{ route('payment.method.change', Auth::user()) }}">変更する</a>
                </div>
                <div class="shipping-address">
                    <h4 class="title">配送先</h4>
                    <a class="link" href="{{ route('address.update.show') }}">変更する</a>
                </div>
            </div>

            <div class="purchase-detail-card">
                <div class="border">
                    <div class="item-price-card">
                        <p class="label">商品代金</p>
                        <p class="value">{{ '￥' . number_format($item->item_price) }}</p>
                    </div>
                    <div class="payment-price-card">
                        <p class="label">支払金額</p>
                        <p class="value">{{ '￥' . number_format($item->item_price) }}</p>
                    </div>
                    <div class="payment-method-card">
                        <p class="label">支払方法</p>
                        <p class="value">
                            @if (Auth::user()->payment_methods == 1)
                                {{ 'クレジットカード' }}
                            @endif
                            @if (Auth::user()->payment_methods == 2)
                                {{ 'コンビニ払い' }}
                            @endif
                            @if (Auth::user()->payment_methods == 3)
                                {{ '銀行振込' }}
                            @endif
                        </p>
                    </div>
                    
                </div>
                @if (Auth::user()->payment_methods == 1)
                <a class="purchase-button" href="{{ route("payment.card",$item) }}">購入する</a>
                @endif
                @if (Auth::user()->payment_methods == 2)
                <a class="purchase-button" href="{{ route("payment.store",$item) }}">購入する</a>
                @endif
                @if (Auth::user()->payment_methods == 3)
                <a class="purchase-button" href="{{ route("payment.bank",$item) }}">購入する</a>
                @endif
            </div>

        </div>

    </main>
</x-layout>
