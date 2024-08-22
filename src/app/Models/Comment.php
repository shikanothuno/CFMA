<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        "item_id",
        "user_id",
        "comment_body",
    ];

    public static function createComment($item_id, $user_id, $comment_body)
    {
        Comment::create([
            "item_id" => $item_id,
            "user_id" => $user_id,
            "comment_body" => $comment_body,
        ]);
    }
}
