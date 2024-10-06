<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'title' => 'About Us',
                'slug' => str_slug('About Us'),
                'sub_title' => null,
                'is_dev' => 1,
            ],
            [
                'title' => 'Contact Us',
                'slug' => str_slug('Contact Us'),
                'sub_title' => null,
                'is_dev' => 1,
            ],
            [
                'title' => 'our service',
                'slug' => str_slug('our service'),
                'sub_title' => 'what we do',
                'is_dev' => 1,
            ],
            [
                'title' => 'We Design Beautiful Websites',
                'slug' => str_slug('We Design Beautiful Websites'),
                'sub_title' => 'About Us',
                'is_dev' => 1,
            ],
            [
                'title' => 'My Recent Work',
                'slug' => str_slug('My Recent Work'),
                'sub_title' => 'Portfolio',
                'is_dev' => 1,
            ],
            [
                'title' => 'meet Valuable Member',
                'slug' => str_slug('meet Valuable Member'),
                'sub_title' => 'Team',
                'is_dev' => 1,
            ],
            [
                'title' => 'Our History',
                'slug' => str_slug('Our History'),
                'sub_title' => null,
                'is_dev' => 1,
            ],
            [
                'title' => 'Get in Touch',
                'slug' => str_slug('Get in Touch'),
                'sub_title' => null,
                'is_dev' => 1,
            ],
        ]);
    }
}
