<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionIdToSalesgraphs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salesgraphs', function (Blueprint $table) {
            $table->unsignedBigInteger('addition_id')->nullable()->after('sponserc');

            $table->foreign('addition_id')->references('id')->on('additions');
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
            $table->dropForeign('salesgraphs_addition_id_foreign');
            $table->dropColumn('addition_id');
        });
    }
}
