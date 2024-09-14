<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        $image = Image::create([
            "image_name" => $image_name,
            "image_url" => $image_url,
        ]);

        return $image;
    }

    public static function storeImage($image_file)
    {
        if(!is_null($image_file)){
            $extension = $image_file->extension();

            $file_name = date("Ymd_His") . "." . $extension;
            $path = Storage::disk("s3")->putFileAs("images", $image_file, $file_name);
            
            
            $url = Storage::disk("s3")->url($path);

            $image = Image::createImage($path, $url);

            return $image;
        }
        return null;
            
    }
}
