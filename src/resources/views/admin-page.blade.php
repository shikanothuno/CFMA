<x-plane-layout title="管理者画面" css="css/admin-page.css">
    <main>
        <div class="container">
            <h4>ユーザー削除</h4>
            <form action="{{ route('admin.user.delete') }}" method="post">
                @csrf
                @method("DELETE")
                <select name="delete-user" id="delete-user">
                    <option value="" selected>{{ "--選択してください。--" }}</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit">削除</button>
            </form>

            <h4>コメント削除</h4>
            <form action="{{ route('admin.comment.delete') }}" method="post">
                @csrf
                @method("DELETE")
                <select name="delete-comment" id="delete-comment">
                    <option value="" selected>{{ "--選択してください。--" }}</option>
                    @foreach ($comments as $comment)
                        <option value="{{ $comment->id }}">{{ "User ID:" . strval($comment->user_id) . "/ Item ID:" . strval($comment->item_id) . "/ Body: . $comment->comment_body"}}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit">削除</button>
            </form>

            <h4>メール送信</h4>
            <form action="{{ route('admin.send.email') }}" method="post">
                @csrf
                <select name="to" id="to">
                    <option value="" selected>{{ "--選択してください。--" }}</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->email }}">{{ $user->email }}</option>
                    @endforeach
                </select>
                <br>
                <label for="subject">題名</label>
                <input name="subject" id="subject" type="text">
                <br>
                <textarea name="body" id="" cols="30" rows="10">

                </textarea>
                <br>

                <button type="submit">送信</button>

            </form>

            <a href="{{ route('items.list') }}">商品一覧</a>
        </div>
    </main>
</x-plane-layout>