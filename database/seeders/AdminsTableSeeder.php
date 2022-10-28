<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Admin;
// use App\Models\User;
// use App\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;



class AdminsTableSeeder extends Seeder
{

    public function run()
    {
        // DB::table('admins')->delete();
        // $adminRecords=[
        //     ['id'=>1,'name'=>'Super admin','type'=>'admin','mobile'=>'8800197778',
        //     'email'=>'ab@ameyem.com','password'=>bcrypt('ab@123'),
        //     'image'=>'','status'=>1],

        // ];

        // $userRecords=[
        //     ['id'=>1,'name'=>'Arun Nalamara','mobile'=>'8800197778','address'=>'he',
        //     'email'=>'ab@ameyem.com','password'=>bcrypt('ab@123'),'status'=>1],

        // ];


        $adminRecords=[
            ['id'=>1,'name'=>'Super admin','type'=>'admin','mobile'=>'8800197778',
            'email'=>'ab@ameyem.com','password'=>bcrypt('ab@123'),
            'image'=>'','status'=>1],
            ['id'=>2,'name'=>'Arun','type'=>'admin','mobile'=>'8800197777',
            'email'=>'admin@ameyem.com','password'=>bcrypt('admin@123'),
            'image'=>'','status'=>1],

        ];

        // DB::table('admins')->insert($adminRecords);
        // DB::table('users')->insert($userRecords);
        foreach ($adminRecords as $key => $record) {
            \App\Models\Admin::create($record);
        }
    }
}
