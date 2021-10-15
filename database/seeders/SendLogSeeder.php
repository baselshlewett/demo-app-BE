<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class SendLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100000; $i++) {
            DB::table('send_log')->insert([
                'usr_id' => rand(1, 4), // since for this demo we have only 4 users, generate a random ID between 1 and 4
                'num_id' => rand(1, 100), // since for this demo we have only 100 users, generate a random ID between 1 and 100 || should be same value as in NumbersSeeder
                'log_message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et tortor lobortis, consectetur lorem id, tristique ante. Proin dapibus mollis viverra. Vivamus vitae finibus sapien. Curabitur id interdum quam, sollicitudin posuere elit. Aliquam consequat ligula turpis, eget venenatis ipsum efficitur eget. Praesent mi dui, maximus quis ultricies sed, lobortis in.                ', // This is just random static text, 50 words
                'log_success' => rand(0, 10) === 1 ? 0 : 1, // randomly choose if the message is success or failure(almost 1 out of 10 messages is a fail)
                'log_created' => Carbon::today()->subDays(rand(0, 100))
            ]);
        }
    }
}
