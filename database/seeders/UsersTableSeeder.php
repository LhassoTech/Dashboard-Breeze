<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'name' => 'Super Admin',
                'email' => 'sadmin@gmail.com',
                'password' => bcrypt('Secret@123@'),
                'image_icon' => null,
                'status' => '1',
                'remember_token' => Str::random(60),
                'created_at' => Carbon::now(),
                'updated_at' => null
            ],
            [
                'role_id' => 2,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('Admin@123@'),
                'image_icon' => null,
                'status' => '1',
                'remember_token' => Str::random(60),
                'created_at' => Carbon::now(),
                'updated_at' => null
            ]
        ]);
    }
}
