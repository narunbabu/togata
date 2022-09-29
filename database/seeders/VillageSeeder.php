<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $items = [            
                ['id' => 1, 'name' => 'Bhattuvaripalle','mandal_id'=>378,'created_by_id'=>1],    
            ];
    
            foreach ($items as $item) {
                \App\Models\Village::create($item);
            }
    }
}
