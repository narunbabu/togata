<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Role;
use App\User;
use App\Currency;

use App\Model\Person;
use App\Model\State;
use App\Models\Admin;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        // $adminRecords=[
        //     ['id'=>1,'name'=>'Super admin','type'=>'admin','mobile'=>'8800197778',
        //     'email'=>'ab@ameyem.com','password'=>bcrypt('ab@123'),
        //     'image'=>'','status'=>1],
        //     ['id'=>2,'name'=>'Arun','type'=>'admin','mobile'=>'8800197777',
        //     'email'=>'admin@ameyem.com','password'=>bcrypt('admin@123'),
        //     'image'=>'','status'=>1],

        // ];

        


    $this->call([
        AdminsTableSeeder::class,
        CurrencySeed::class,
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

        
        
    ]);

}
}
