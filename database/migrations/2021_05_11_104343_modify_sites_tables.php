<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySitesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites', function (Blueprint $table) {
            
            $table->string('name')->nullable()->change();
            $table->string('url')->nullable()->change();
            $table->datetime('contract_day')->nullable()->change();
            $table->string('inside_staff')->nullable()->change();
            $table->string('outside_staff')->nullable()->change();
            $table->datetime('start')->nullable()->change();
            $table->datetime('open')->nullable()->change();
            $table->string('production_cost')->nullable()->change();
            $table->string('operating_cost')->nullable()->change();
            $table->string('sponsor_cost')->nullable()->change();
            
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
            $table->string('name')->change();
            $table->string('url')->change();
            $table->datetime('contract_day')->change();
            $table->string('inside_staff')->change();
            $table->string('outside_staff')->change();
            $table->datetime('start')->change();
            $table->datetime('open')->change();
            $table->string('production_cost')->change();
            $table->string('operating_cost')->change();
            $table->string('sponsor_cost')->change();
        });
    }
}
