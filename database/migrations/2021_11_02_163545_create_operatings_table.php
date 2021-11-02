<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operatings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('operecord_id');
            $table->string('day');
            $table->string('check')->default('0');
            $table->timestamps();

            $table->foreign('operecord_id')->references('id')->on('operecords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operatings');
    }
}
