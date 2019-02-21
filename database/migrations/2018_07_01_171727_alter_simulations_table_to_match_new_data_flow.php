<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSimulationsTableToMatchNewDataFlow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('simulations', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->text('input_script');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('simulations', function (Blueprint $table) {
            $table->unsignedInteger('image');
            $table->dropColumn('input_script');
        });
    }
}
