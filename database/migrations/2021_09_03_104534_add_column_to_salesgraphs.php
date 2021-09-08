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
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('sponserc')->nullable();
            $table->string('addition')->nullable();
            $table->string('system')->nullable();

            $table->foreign('payment_id')->references('id')->on('payments');
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
            $table->dropForeign('salesgraphs_payment_id_foreign');
            $table->dropColumn('payment_id');
            $table->dropColumn('sponserc');
            $table->dropColumn('addition');
            $table->dropColumn('system');
        });
    }
}
