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
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->string('analytics')->nullable();
            $table->string('contract');
            $table->date('contract_day')->nullable();
            $table->string('inside_staff')->nullable();
            $table->string('outside_staff')->nullable();
            $table->date('start')->nullable();
            $table->date('open')->nullable();
            $table->string('production_cost')->nullable();
            $table->string('operating_cost')->nullable();
            $table->string('sponsor_cost')->nullable();
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
