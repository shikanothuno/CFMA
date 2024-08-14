<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Image;
use App\Models\Item;
use App\Models\ItemStatus;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DataBaseCreateTest extends TestCase
{
    public function test_category_create_success()
    {
        $faker = Faker::create();
        $category_name = $faker->word();
        Category::createCategory($category_name);

        $this->assertDatabaseHas("categories",[
            "category_name" => $category_name,
        ]);
    }

    public function test_item_status_create_success()
    {
        $faker = Faker::create();
        $item_status_name = $faker->word();
        ItemStatus::createItemStatus($item_status_name);

        $this->assertDatabaseHas("item_statuses",[
            "item_status_name" => $item_status_name,
        ]);
    }

    public function test_image_create_success()
    {
        $faker = Faker::create();
        $image_name = $faker->word();
        $image_url = $faker->imageUrl();
        Image::createImage($image_name,$image_url);

        $this->assertDatabaseHas("images",[
            "image_name" => $image_name,
            "image_url" => $image_url,
        ]);
    }

    public function test_item_create_success()
    {
        $faker = Faker::create();
        $category_id = 1;
        $item_status_id = 1;
        $item_name = $faker->word();
        $item_brand_name = $faker->word();
        $item_description = $faker->realText();
        $item_price = $faker->randomNumber();
        $image_id = 1;
        Item::createItem($category_id,$item_status_id,$item_name,
        $item_brand_name,$item_description,$item_price,$image_id);

        $this->assertDatabaseHas("items",[
            "category_id" =>$category_id,
            "item_status_id" => $item_status_id,
            "item_name" => $item_name,
            "item_brand_name" => $item_brand_name,
            "item_description" => $item_description,
            "item_price" => $item_price,
            "image_id" => $image_id,
        ]);

    }
}
