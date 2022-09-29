<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ,'password' => '$2y$10$msflsjAZ7jGwsJBZ18Uthu.C8DWDzxdRGhuwQpFUgreL4MPPxU0zq'
        $items = [
            
            
            ['id'=>1,'name'=>'Arun Nalamara','mobile'=>'8800197778','address'=>'he',
            'email'=>'ab@ameyem.com','password'=>bcrypt('ab@123'),'status'=>1,'role_id'=>1],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
