<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'role' => 'Super Admin',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => null
            ],
            [
                'role' => 'Admin',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => null
            ]
        ]);
    }
}
