<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class SendLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_log', function (Blueprint $table) {
            $table->id('log_id');
            $table->unsignedBigInteger('usr_id');
            $table->unsignedBigInteger('num_id');
            $table->text('log_message');
            $table->boolean('log_success');
            $table->timestamp('log_created')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('usr_id')->references('usr_id')->on('users');
            $table->foreign('num_id')->references('num_id')->on('numbers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('send_log');
    }
}
