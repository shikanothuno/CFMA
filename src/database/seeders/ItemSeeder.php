<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0;$i < 100;$i++){
            $item = Item::createItem(1,"テスト商品","テストブランド","テスト商品です。",4500,1,[1,2,3],1);

            Item::setPurchaseUser($item, 2);
        }
    }
}
