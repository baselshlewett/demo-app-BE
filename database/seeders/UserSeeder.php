<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

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
                'usr_name' => 'John Doe',
                'usr_active' => 1
            ],
            [
                'usr_name' => 'Jane',
                'usr_active' => 1
            ],
            [
                'usr_name' => 'Basel sh',
                'usr_active' => 1
            ],
            [
                'usr_name' => 'Lorem Ipsum',
                'usr_active' => 1
            ]
        ]);
    }
}
