<x-layout title="プロフィール設定" css="css/profile-setting.css">
    <main>
        <div class="container">
            <h2 class="title">プロフィール設定</h2>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            <form class="input-form" action="{{ route('profile.setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="thumbnail-and-uplode-image">
                    <img class="thumbnail" src="{{ is_null($user->image) 
                    ? asset('images/default.png') : 
                    asset($user->image->image_url)}}" alt="">
                    <a class="image-select-button" id="image-select-button" href="">画像を選択する</a>
                    <input class="image-upload" id="image-upload" type="file" name="image" accept="image/*">
                </div>
                <div class="inputs">
                    <label class="label" for="name">ユーザー名</label>
                    <input class="input" id="name" name="name" type="text" value="{{ $user->name }}">
                    <label class="label" for="zip-code">郵便番号</label>
                    <input class="input" id="zip-code" name="zip-code" type="text" value="{{ $user->user_zip_code }}">
                    <label class="label" for="address">住所</label>
                    <input class="input" id="address" name="address" type="text" value="{{ $user->user_address }}">
                    <label class="label" for="building-name">建物名</label>
                    <input class="input" id="building-name" name="building-name" type="text" value="{{ $user->user_building_name }}">
                    <button class="update-button" type="submit">更新する</button>
                </div>
            </form>
        </div>
    </main>
    <script src="{{ asset('js/profile-setting.js') }}"></script>
</x-layout>