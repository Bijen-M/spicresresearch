<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SettingsSeeder::class);
//        $this->call(TestimonialSeeder::class);
        $this->call(DepartmentSeeder::class);
//        $this->call(CategorySeeder::class);
//        $this->call(TagSeeder::class);
//        $this->call(BlogSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(MenuSeeder::class);
    }
}
