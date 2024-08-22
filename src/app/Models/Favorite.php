<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "item_id",
    ];

    public static function createFavorite($user_id, $item_id)
    {
        Favorite::create([
            "user_id" => $user_id,
            "item_id" => $item_id,
        ]);
    }
}
