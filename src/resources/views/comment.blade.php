<x-layout title="コメント" css="css/comment.css">
    <main>
        <div class="container">
            <div class="item-img-card">
                <img class="item-img" src="{{ $item->image->image_url }}" alt="">
            </div>
            <div class="item-detail-and-comment-card">
                <h2 class="item-name">{{ $item->item_name }}</h2>
                <h3 class="item-brand-name">{{ $item->item_brand_name }}</h3>
                <h4 class="item-price">{{ '￥' . number_format($item->item_price) . '(値段)' }}</h4>
                <div class="favorite-and-comment">
                    <table>
                        <tr>
                            <td class="favorite-and-comment__td"><a href=""
                                    onclick="event.preventDefault();
                            document.getElementById('toggle-favorite-form').submit()"><img
                                        class="icon" src="{{ asset('images/favorite.png') }}" alt=""></a></td>
                            <form id="toggle-favorite-form" method="POST" action="{{ route('toggle.favorite', $item) }}"
                                style="display: none;">@csrf</form>
                            <td class="favorite-and-comment__td"><a href=""><img class="icon"
                                        src="{{ asset('images/comment.png') }}" alt=""></a></td>
                        </tr>
                        <tr>
                            <td class="favorite-and-comment__td">
                                <p class="value">{{ count($item->favorites) }}</p>
                            </td>
                            <td class="favorite-and-comment__td">
                                <p class="value">{{ count($item->comments) }}</p>
                            </td>
                        </tr>
                    </table>
                </div>
                @foreach ($comments as $comment)
                    @if (Auth::id() === $comment->id)
                        <div class="user-name-and-icon right">
                            <p class="user-name">{{ $comment->name ? $comment->name : 'Anonymous' }}</p>
                            <div class="user-thumbnail__div"><img class="user-thumbnail"
                                    src="{{ $comment->image_id ? asset($comment->image_id) : asset('images/default.png') }}"
                                    alt=""></div>
                        </div>
                    @else
                        <div class="user-name-and-icon">
                            <div class="user-thumbnail__div"><img class="user-thumbnail"
                                    src="{{ $comment->image_id ? asset($comment->image_id) : asset('images/default.png') }}"
                                    alt=""></div>
                            <p class="user-name">{{ $comment->name ? $comment->name : 'Anonymous' }}</p>
                        </div>
                    @endif
                    <p class="comment-body">{{ $comment->pivot->comment_body }}</p>
                @endforeach
                <p class="comment-for-item">商品へのコメント</p>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <form class="comment-form" action="{{ route('comment.store', Auth::user()) }}" method="POST">
                    @csrf
                    <textarea class="comment-area" name="comment-body" id="" cols="30" rows="10"></textarea>
                    <br>
                    <button class="submit-button" type="submit">コメントを送信する</button>
                </form>
            </div>

        </div>
    </main>
</x-layout>
