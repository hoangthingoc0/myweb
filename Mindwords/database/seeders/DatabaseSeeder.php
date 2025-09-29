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
        User::firstOrCreate(
            [
                'email' => 'ngoc@example.com',
            ],
            [
                'name' => 'Thi Ngoc',
                'password' => bcrypt('password'),
                'avatar' => null,
                'role' => 'user',
                'bio' => 'Hello, I am Thi Ngoc.',
                'learning_goal' => 'Learn words every day',
                'points' => 0,
                'streak_days' => 0,
            ]
        );      
    }
}
