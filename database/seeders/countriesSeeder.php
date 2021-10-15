<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class countriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'cnt_code' => '972',
                'cnt_title' => 'Israel',
            ],
            [
                'cnt_code' => '1',
                'cnt_title' => 'United States of America',
            ],
            [
                'cnt_code' => '32',
                'cnt_title' => 'Belgium',
            ],
            [
                'cnt_code' => '39',
                'cnt_title' => 'Italy',
            ]
        ]);
    }
}
