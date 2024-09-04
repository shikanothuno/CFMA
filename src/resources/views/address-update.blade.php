<x-plane-layout title="住所の変更" css="css/address-update.css">
    <main>
        <div class="container">
            <h2 class="title">住所の変更</h2>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <div class="form-div">
                <form action="{{ route("address.update.store") }}" method="post">
                    @csrf
                    @method("PUT")
                    <label class="label" for="zip-code">郵便番号</label>
                    <input class="input" type="text" id="zip-code" name="zip-code" value="{{ old('zip-code', $user->user_zip_code) }}">
                    <label class="label" for="address">住所</label>
                    <input class="input" type="text" id="address" name="address" value="{{ old('address', $user->user_address) }}">
                    <label class="label" for="building-name">建物名</label>
                    <input class="input" type="text" id="building-name" name="building-name" value="{{ old('building-name', $user->user_building_name) }}">
                    <button class="submit-button" type="submit">更新する</button>
                </form>
            </div>
        </div>
    </main>
</x-plane-layout>
