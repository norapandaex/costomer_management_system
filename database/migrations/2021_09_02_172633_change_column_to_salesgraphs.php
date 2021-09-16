<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnToSalesgraphs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salesgraphs', function (Blueprint $table) {
            $table->unsignedBigInteger('site_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salesgraphs', function (Blueprint $table) {
            $table->unsignedBigInteger('site_id')->change();
        });
    }
}
