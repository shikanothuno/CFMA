<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::createAdminUser("admin@example.com","password");

        for($i = 0;$i < 100;$i++){
            $email = "test" . strval($i) . "@example.com";
            $password = "password";
            User::createGeneralUser($email, $password);
        }
    }
}
