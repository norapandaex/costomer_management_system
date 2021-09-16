<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('costomer_id')->nullable();
            $table->datetime('day');
            $table->string('title');
            $table->string('content');
            $table->string('status')->default(0);
            $table->string('reminder');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('costomer_id')->references('id')->on('costomers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
