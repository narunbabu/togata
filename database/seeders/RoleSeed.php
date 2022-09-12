<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Administrator (can create other users)',],
            ['id' => 2, 'title' => 'User with full rights',],
            ['id' => 3, 'title' => 'Volunteer',],
            ['id' => 4, 'title' => 'Previlized user',],
            ['id' => 5, 'title' => 'Simple user',],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
