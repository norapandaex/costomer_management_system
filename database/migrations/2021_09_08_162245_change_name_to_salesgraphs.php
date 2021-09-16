<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNameToSalesgraphs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salesgraphs', function (Blueprint $table) {
            $table->renameColumn('addition', 'additionc');
            $table->renameColumn('system', 'systemc');
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
            $table->renameColumn('additionc', 'addition');
            $table->renameColumn('systemc', 'system');
        });
    }
}
