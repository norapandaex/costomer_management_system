<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('costomer_id');
            $table->string('name');
            $table->string('cost')->nullable();
            $table->string('rate')->nullable();
            $table->string('start')->nullable();
            $table->string('stop')->nullable();
            $table->string('pay')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('sponsers');
    }
}
