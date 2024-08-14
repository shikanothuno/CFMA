<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category_names = [
            'レディース',
            'メンズ',
            'ベビー・キッズ',
            'インナー・ルームウェア',
            '靴',
            'バッグ',
            'アクセサリー',
            '時計',
            '帽子',
            'メガネ',
            '財布',
            '本・雑誌',
            'マンガ',
            'CD・DVD',
            'ゲーム・おもちゃ',
            '楽器',
            'スマートフォン・携帯電話',
            'パソコン',
            'カメラ',
            'テレビ・オーディオ',
            '生活家電',
            'ゴルフ',
            '釣り',
            '自転車',
            'トレーニング用品',
            'アウトドア用品',
            '家具',
            'インテリア',
            'キッチン用品',
            '文房具',
            '子ども用品',
            'スキンケア',
            'ヘアケア',
            'メイクアップ',
            '香水',
            'ボディケア',
            '食品',
            '飲料',
            'お菓子',
            '調味料',
            'ペット用品',
            'チケット',
            'アンティーク・コレクション',
            'その他'
        ];

        foreach($category_names as $category_name){
            Category::createCategory($category_name);
        }
    }
}
