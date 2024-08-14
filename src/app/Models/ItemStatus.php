<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        "item_status_name",
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public static function createItemStatus($item_status_name)
    {
        ItemStatus::create([
            "item_status_name" => $item_status_name,
        ]);
    }
}
