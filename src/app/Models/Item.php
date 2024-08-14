<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        "category_id",
        "item_status_id",
        "item_name",
        "item_brand_name",
        "item_description",
        "item_price",
        "image_id",
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function item_status()
    {
        return $this->belongsTo(ItemStatus::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public static function createItem($category_id, $item_status_id, $item_name, $item_brand_name, $item_description, $item_price, $image_id)
    {
        Item::create([
            "category_id" => $category_id,
            "item_status_id" => $item_status_id,
            "item_name" => $item_name,
            "item_brand_name" => $item_brand_name,
            "item_description" => $item_description,
            "item_price" => $item_price,
            "image_id" => $image_id,
        ]);
    }
}
