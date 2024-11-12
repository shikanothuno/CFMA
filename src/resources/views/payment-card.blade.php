<x-plane-layout title="クレジットカード支払い" css="css/payment-card.css">
    <main>
        <div class="container">
            <form action="{{ route('payment.stripe', $item) }}" method="POST">
                @csrf
                <div class="button">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ env('STRIPE_KEY') }}"
                        data-amount={{ $item->item_price }} data-name="お支払い画面" data-label="支払い" data-description="現在はデモ画面です"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-currency="JPY">
                    </script>
                </div>
            </form>
        </div>
    </main>
</x-plane-layout>
