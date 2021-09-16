<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChengeDatetimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->date('contract_day')->nullable()->change();
            $table->date('start')->nullable()->change();
            $table->date('open')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->datetime('contract_day')->nullable()->change();
            $table->datetime('start')->nullable()->change();
            $table->datetime('open')->nullable()->change();
        });
    }
}
