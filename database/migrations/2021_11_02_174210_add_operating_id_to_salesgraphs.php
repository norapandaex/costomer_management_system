<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOperatingIdToSalesgraphs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salesgraphs', function (Blueprint $table) {
            $table->unsignedBigInteger('operating_id')->nullable()->after('production_cost');

            $table->foreign('operating_id')->references('id')->on('operatings');
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
            $table->dropForeign('salesgraphs_operating_id_foreign');
            $table->dropColumn('operating_id');
        });
    }
}
