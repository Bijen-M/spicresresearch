<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'name' => 'Developer',
                'email' => 'dev@gmail.com',
                'password' => bcrypt('dev@2486'),
                'is_admin' => 1,
                'is_dev' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin@123'),
                'is_admin' => 1,
                'is_dev' => 0,
                'status' => 1,
            ],
        ]);
    }
}
