<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "category_name"
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public static function createCategory($category_name)
    {
        Category::create([
            "category_name" => $category_name,
        ]);
    }
}
