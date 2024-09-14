<x-plane-layout title="商品の出品" css="css/listing.css">
    <div class="container">
        <h2 class="title">商品の出品</h2>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <form class="input-form" action="{{ route('listing.item.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h4 class="text-item-image">商品画像</h4>
            <div class="border-item-image">
                <a class="upload-button" id="image-select-button" href="">画像を選択する</a>
                <input class="image-upload" id="image-upload" type="file" name="image" accept="image/*">
            </div>

            <h3 class="text-item-detail">商品の詳細</h3>
            <div class="bar"></div>
            <label class="label" for="category">カテゴリー</label>
            <select class="select" name="category" id="category">
                <option value=""></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
            <label class="label" for="item-status">商品の状態</label>
            <select class="select" name="item-status" id="item-status">
                <option value=""></option>
                @foreach ($item_statuses as $item_status)
                    <option value="{{ $item_status->id }}">{{ $item_status->item_status_name }}</option>
                @endforeach
            </select>

            <h3 class="text-item-name-and-descrption">商品名と説明</h3>
            <div class="bar"></div>
            <label class="label" for="item-name">商品名</label>
            <input class="input" id="item-name" name="item-name" type="text" value="{{ old('item-name') }}">
            <label class="label" for="item-brand-name">ブランド名</label>
            <input class="input" id="item-brand-name" name="item-brand-name" type="text" value="{{ old('item-brand-name') }}">
            <label class="label" for="item-description">商品の説明</label>
            <textarea class="textarea" name="item-description" id="item-description" cols="30" rows="5">{{ old("item-description") }}</textarea>

            <h3 class="text-sales-price">販売価格</h3>
            <div class="bar"></div>
            <label class="label" for="sales-price">販売価格</label>          
            <input class="input input-price" id="sales-price" name="sales-price" type="text" value="{{ old('sales-price') }}">    

            <button class="listing-button">出品する</button>
        </form>
    </div>
    <script src="{{ asset('js/listing.js') }}"></script>
</x-plane-layout>