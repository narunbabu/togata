<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'Alluri Sitharama Raju','state_id'=>1],
            ['id' => 2, 'name' => 'Anakapalli','state_id'=>1],
            ['id' => 3, 'name' => 'Anantapuram','state_id'=>1],
            ['id' => 4, 'name' => 'Annamayya','state_id'=>1],
            ['id' => 5, 'name' => 'Bapatla','state_id'=>1],
            ['id' => 6, 'name' => 'Chittoor','state_id'=>1],
            ['id' => 7, 'name' => 'East Godavari','state_id'=>1],
            ['id' => 8, 'name' => 'Eluru','state_id'=>1],
            ['id' => 9, 'name' => 'Guntur','state_id'=>1],
            ['id' => 10, 'name' => 'Kakinada','state_id'=>1],
            ['id' => 11, 'name' => 'Konaseema','state_id'=>1],
            ['id' => 12, 'name' => 'Krishna','state_id'=>1],
            ['id' => 13, 'name' => 'Kurnool','state_id'=>1],
            ['id' => 14, 'name' => 'Nandyal','state_id'=>1],
            ['id' => 15, 'name' => 'NTR','state_id'=>1],
            ['id' => 16, 'name' => 'Palnadu','state_id'=>1],
            ['id' => 17, 'name' => 'Parvathipuram Manyam','state_id'=>1],
            ['id' => 18, 'name' => 'Prakasam','state_id'=>1],
            ['id' => 19, 'name' => 'Sri Potti Sri Ramulu Nellore','state_id'=>1],
            ['id' => 20, 'name' => 'Sri Sathya Sai','state_id'=>1],
            ['id' => 21, 'name' => 'Srikakulam','state_id'=>1],
            ['id' => 22, 'name' => 'Tirupati','state_id'=>1],
            ['id' => 23, 'name' => 'Visakhapatnam','state_id'=>1],
            ['id' => 24, 'name' => 'Vizianagaram','state_id'=>1],
            ['id' => 25, 'name' => 'West Godavari','state_id'=>1],
            ['id' => 26, 'name' => 'YSR','state_id'=>1],
        ];

        foreach ($items as $item) {
            \App\Models\District::create($item);
        }
    }
}
