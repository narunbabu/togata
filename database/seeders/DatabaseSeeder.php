<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Role;
use App\User;
use App\Model\Person;
use App\Model\State;
use App\Models\Admin;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{

    public function run()
    {
       
    $this->call([
        // AdminsTableSeeder::class,
        // CurrencySeed::class,
        RoleSeeder::class,
        // IntiperuSeeder::class,
        UserSeeder::class, 
        StateSeeder::class,
        DistrictSeeder::class,
        MandalSeeder::class,        
        VillageSeeder::class,               
        PersonSeed::class,
        PersonRelatedTableSeeder::class,
        HouseDetailsTableSeeder::class,               
        TweetTypeSeeder::class,
        TweetsTableSeeder::class,
        
    ]);




}
}
