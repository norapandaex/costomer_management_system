<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCostcToSalesgraphs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salesgraphs', function (Blueprint $table) {
            $table->unsignedBigInteger('cost_id')->nullable();
            $table->string('costc')->nullable();

            $table->foreign('cost_id')->references('id')->on('costs');
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
            $table->dropForeign('salesgraphs_cost_id_foreign');
            $table->dropColumn('cost_id');
            $table->dropColumn('costc');
        });
    }
}
