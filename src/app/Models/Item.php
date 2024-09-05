<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        "item_status_id",
        "item_name",
        "item_brand_name",
        "item_description",
        "item_price",
        "image_id",
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function item_status()
    {
        return $this->belongsTo(ItemStatus::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, "favorites");
    }

    public function comments()
    {
        return $this->belongsToMany(User::class, "comments")->withPivot("comment_body");
    }

    public function listing_user()
    {
        return $this->belongsTo(User::class, "listing_user");
    }

    public function purchase_user()
    {
        return $this->belongsTo(User::class, "purchase_user");
    }


    public static function createItem($item_status_id, $item_name, $item_brand_name,
    $item_description, $item_price, $image_id, $category_ids, $listing_user)
    {
        $item = Item::create([
            "item_status_id" => $item_status_id,
            "item_name" => $item_name,
            "item_brand_name" => $item_brand_name,
            "item_description" => $item_description,
            "item_price" => $item_price,
            "image_id" => $image_id,
            "listing_user" => $listing_user,
        ]);

        $item->categories()->attach($category_ids);

        return $item;
    }

    public static function setPurchaseUser($item, $purchase_user)
    {
        $item->purchase_user = $purchase_user;
        $item->save();
    }
}
