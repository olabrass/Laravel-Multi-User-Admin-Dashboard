<?php

namespace Database\Seeders;

use App\Models\Admins;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        $adminRecord =[
           // ['id'=>1, 'name'=>'Sub Admin 1', 'type'=>'subadmin', "password"=>"1234", "image"=>"coming son", 'phone'=>'08136274867', 'email'=>'subadmin1@gmail.com', 'status'=>1],
           // ['id'=>2, 'name'=>'Sub Admin 2', 'type'=>'subadmin', "password"=>"1234", "image"=>"coming soo", 'phone'=>'08136623857', 'email'=>'subadmin2@gmail.com', 'status'=>1],
            ['id'=>3, 'name'=>'Sub Admin 3', 'type'=>'subadmin', "password"=>"1234", "image"=>"coming oon", 'phone'=>'08129226867', 'email'=>'subadmin3@gmail.com', 'status'=>1],
            ['id'=>4, 'name'=>'Sub Admin 4', 'type'=>'subadmin', "password"=>"1234", "image"=>"coming suoon", 'phone'=>'08293626867', 'email'=>'subadmin4@gmail.com', 'status'=>0]
        ];
        Admins::insert($adminRecord);
    }
    
}
