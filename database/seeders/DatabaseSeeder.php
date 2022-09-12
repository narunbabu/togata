<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Role;
use App\User;
use App\Currency;
use App\Models\Admin;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $users = [
            
            
        //     ['id' => 1, 'name' => 'Admin', 'email' => 'ab@ameyem.com', 'password' =>bcrypt('arun@123'), 'role_id' => 1, 'remember_token' => '', 'currency_id' => 1],

        // ];

        $userRecords=[
            ['id'=>1,'name'=>'Arun Nalamara','mobile'=>'8800197778','address'=>'he',
            'email'=>'ab@ameyem.com','password'=>bcrypt('ab@123'),'status'=>1,'role_id'=>1],

        ];

        $roles = [
            
            ['id' => 1, 'title' => 'Administrator (can create other users)',],
            ['id' => 2, 'title' => 'User with full rights',],
            ['id' => 3, 'title' => 'Volunteer',],
            ['id' => 4, 'title' => 'Previlized user',],
            ['id' => 5, 'title' => 'Simple user',],

        ];
        $correncies = [
            
            ['id' => 1, 'title' => 'INR', 'symbol' => '₹', 'money_format_thousands' => ',', 'money_format_decimal' => '.'],
            ['id' => 2, 'title' => 'USD', 'symbol' => '$', 'money_format_thousands' => '.', 'money_format_decimal' => ','],
            ['id' => 3, 'title' => 'EUR', 'symbol' => '€', 'money_format_thousands' => '.', 'money_format_decimal' => ','],

        ];
        $adminRecords=[
            ['id'=>1,'name'=>'Super admin','type'=>'admin','mobile'=>'8800197778',
            'email'=>'ab@ameyem.com','password'=>bcrypt('ab@123'),
            'image'=>'','status'=>1],
            ['id'=>2,'name'=>'Arun','type'=>'admin','mobile'=>'8800197777',
            'email'=>'admin@ameyem.com','password'=>bcrypt('admin@123'),
            'image'=>'','status'=>1],

        ];


        // $this->call(AdminsTableSeeder::class);
        DB::table('roles')->insert($roles);
        DB::table('admins')->insert($adminRecords);
        DB::table('users')->insert( $userRecords);
        DB::table('currencies')->insert( $correncies);
        // $this->call(RoleSeed::class);
        // $this->call(UserSeed::class);
        // $this->call(CurrencySeed::class);
    }
}
