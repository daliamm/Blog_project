<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
          'name'=>'Admin',
          'email'=>'admin@test.local',
          'password'=>bcrypt('1234'),
          'created_at'=>'2023-03-22 13:25:10',
          'updated_at'=>'2023-03-22 13:25:10'
           
        ]);
    }
}
