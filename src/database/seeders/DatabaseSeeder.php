<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ItemStatusSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(FavoriteSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
