<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'department_id' => 1,
                'title' => 'Header Navs',
                'slug' => str_slug('Header Navs'),
                'is_dev' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'department_id' => 1,
                'title' => 'Footer Navs',
                'slug' => str_slug('Header Navs'),
                'is_dev' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'department_id' => 2,
                'title' => 'Header Navs',
                'slug' => str_slug('Header Navs'),
                'is_dev' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'department_id' => 2,
                'title' => 'Footer Navs',
                'slug' => str_slug('Header Navs'),
                'is_dev' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
