<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class TweetsTableSeeder extends Seeder
{
    // Create 10 tweets for user with id 1
    public function run()
    {
        // Create 10 tweets for user with id 1
        for ($i = 1; $i <= 10; $i++) {
            DB::table('tweets')->insert([
                'user_id' => 1,
                'text' => "This is tweet number $i",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
