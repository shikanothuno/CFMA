<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable= [
        "image_name",
        "image_url",
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function createImage($image_name, $image_url)
    {
        Image::create([
            "image_name" => $image_name,
            "image_url" => $image_url,
        ]);
    }
}
