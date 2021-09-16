<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesgraphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesgraphs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('site_id')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->unsignedBigInteger('addition_id')->nullable()->after('sponserc');
            $table->string('month');
            $table->string('production_cost')->nullable();
            $table->string('operating_cost')->nullable();
            $table->string('sum_cost')->nullable();
            $table->string('sponserc')->nullable();
            $table->string('additionc')->nullable();
            $table->string('systemc')->nullable();
            $table->timestamps();

            $table->foreign('addition_id')->references('id')->on('additions');
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->foreign('site_id')->references('id')->on('sites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salesgraphs');
    }
}
