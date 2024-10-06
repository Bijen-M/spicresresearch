<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
                'website_name' => 'Spices Research & Consulting Pvt. Ltd.',
                'home_title' => 'Looking for <span> It solution &amp; architect solution </span> you are in the right place.',
                'home_summary' => 'Established in 2016 by a team of professionals having rich experience in Information and Communication Technologies, Architecture Designing and Consulting, and Business Research and Management, Spices Research & Consulting Pvt. Ltd. offers an array of designing and consulting services in these fields.',
                'address' => 'Manidwon marg, UN Park 22-Lalitpur, Nepal',
                'contact_no' => '+977-1-5261107',
                'email' => 'info@spicesresearch.com',
            ]);
    }
}
