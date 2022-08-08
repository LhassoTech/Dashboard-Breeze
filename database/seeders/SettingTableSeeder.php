<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'site_name' => 'Company Name',
                'site_url' => 'www.companyname.com',
                'site_email' => 'info@gmail.com',
                'site_mobile' => '+977-9849000000',
                'site_phone' => '014 1234567',
                'site_address' => 'Kathmandu,Nepal',
                'img_logo' => null,
                'img_fav' => null,
                'latitude' => null,
                'longitude' => null,
                'site_copyright' => 'Copyright @2022 Company. All Rights Reserved.',
                'facebook_url' => 'url',
                'twitter_url' => 'url',
                'linkedin_url' => 'url',
                'instagram_url' => 'url',
                'youtube_url' => 'url',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ]
        ]);
    }
}
