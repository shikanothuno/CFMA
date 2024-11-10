<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function showCommentView(Item $item)
    {
        $comments = $item->comments;
        return view("comment", compact("item", "comments"));
    }

    public function storeComment(Item $item, StoreCommentRequest $request)
    {
        $comment_body = $request->input("comment-body");
        Comment::createComment($item->id, Auth::id(), $comment_body);

        return redirect(route("comment.view", $item));
    }
}
