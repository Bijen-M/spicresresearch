<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'title' => 'Information Technology',
                'slug' => 'information-technology',
                'icon' => 'web',
            ],
            [
                'title' => 'Architecture & Engineering',
                'slug' => 'architecture-engineering',
                'icon' => 'architecture',
            ],
            [
                'title' => 'Research & Management',
                'slug' => 'research-management',
                'icon' => 'learn',
            ],
        ]);
    }
}
