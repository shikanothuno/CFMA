<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $image_name = "test.webp";
        $image_url = "https://shikanothuno-test.s3.ap-northeast-1.amazonaws.com/images/sushi.webp";
        Image::createImage($image_name, $image_url);
    }
}
