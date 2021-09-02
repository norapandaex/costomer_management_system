<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSalesgraphs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salesgraphs', function (Blueprint $table) {
            $table->string('sponser');
            $table->string('addition');
            $table->string('system');
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
            $table->dropColumn('sponser');
            $table->dropColumn('addition');
            $table->dropColumn('system');
        });
    }
}
