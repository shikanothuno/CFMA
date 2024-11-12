<x-layout title="支払方法おの変更" css="css/payment-method-change.css">
    <main>
        <div class="container">
            <form action="{{ route('payment.method.store', Auth::user()) }}" method="post">
                @csrf
                <label class="label-name" for="payment_method">
                    クレジットカード
                </label>
                <input class="radio-input" type="radio" name="payment-method" id="payment-method" value="1"
                    {{ $user->payment_methods == 1 ? 'checked' : '' }}>
                <label class="label-name" for="payment_method">
                    コンビニ
                </label>
                <input class="radio-input" type="radio" name="payment-method" id="payment-method" value="2"
                    {{ $user->payment_methods == 2 ? 'checked' : '' }}>
                <label class="label-name" for="payment_method">
                    銀行振込
                </label>
                <input class="radio-input" type="radio" name="payment-method" id="payment-method" value="3"
                    {{ $user->payment_methods == 3 ? 'checked' : '' }}>
                <button class="change-button" type="submit">変更</button>
            </form>
        </div>
    </main>
</x-layout>
