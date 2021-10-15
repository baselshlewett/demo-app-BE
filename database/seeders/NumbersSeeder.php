<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class NumbersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('numbers')->insert([
                'cnt_id' => rand(1, 4), // since for this demo we have only 4 countries, generate a random ID between 1 and 4
                'num_number' => rand(1000000000, 9999999999) // generates a random 10 digits phone number
            ]);
        }
    }
}
