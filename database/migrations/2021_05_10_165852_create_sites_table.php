<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('costomer_id');
            $table->string('name');
            $table->string('url');
            $table->datetime('contract_day');
            $table->string('inside_staff');
            $table->string('outside_staff');
            $table->datetime('start');
            $table->datetime('open');
            $table->string('production_cost');
            $table->string('operating_cost');
            $table->string('sponsor_cost');
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
        Schema::dropIfExists('sites');
    }
}
