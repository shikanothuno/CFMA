<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Favorite;
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
        $this->markTestSkipped("このテストはスキップされました。");

        $faker = Faker::create();
        $category_name = $faker->word();
        Category::createCategory($category_name);

        $this->assertDatabaseHas("categories",[
            "category_name" => $category_name,
        ]);
    }

    public function test_item_status_create_success()
    {
        $this->markTestSkipped("このテストはスキップされました。");

        $faker = Faker::create();
        $item_status_name = $faker->word();
        ItemStatus::createItemStatus($item_status_name);

        $this->assertDatabaseHas("item_statuses",[
            "item_status_name" => $item_status_name,
        ]);
    }

    public function test_image_create_success()
    {
        $this->markTestSkipped("このテストはスキップされました。");

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
        $this->markTestSkipped("このテストはスキップされました。");

        $faker = Faker::create();
        $item_status_id = 1;
        $item_name = $faker->word();
        $item_brand_name = $faker->word();
        $item_description = $faker->realText();
        $item_price = $faker->randomNumber();
        $image_id = 1;
        $cateogry_ids = [1,2,3];
        $listing_user = 1;
        Item::createItem($item_status_id,$item_name,
        $item_brand_name,$item_description,$item_price,$image_id,$cateogry_ids,$listing_user);

        $this->assertDatabaseHas("items",[
            "item_status_id" => $item_status_id,
            "item_name" => $item_name,
            "item_brand_name" => $item_brand_name,
            "item_description" => $item_description,
            "item_price" => $item_price,
            "image_id" => $image_id,
        ]);

    }

    public function test_favorite_create_success()
    {
        $this->markTestSkipped("このテストはスキップされました。");
        Favorite::createFavorite(1, 1);

        $this->assertDatabaseHas("favorites",[
            "user_id" => 1,
            "item_id" => 1,
        ]);
    }

    public function test_comment_create_success()
    {
        $this->markTestSkipped("このテストはスキップされました。");
        $text = "コメント";
        Comment::createComment(1, 1, $text);

        $this->assertDatabaseHas("comments",[
            "item_id" => 1,
            "user_id" => 1,
            "comment_body" => $text,
        ]);
    }
}
