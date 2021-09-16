<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('costomers', function (Blueprint $table) {
            $table->string('prefecture')->nullable()->after('address');
            $table->string('city')->nullable()->after('prefecture');
            $table->string('other')->nullable()->after('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('costomers', function (Blueprint $table) {
            $table->dropColumn('prefecture');
            $table->dropColumn('city');
            $table->dropColumn('other');
        });
    }
}
