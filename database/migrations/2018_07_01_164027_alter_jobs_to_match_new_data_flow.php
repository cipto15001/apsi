<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterJobsToMatchNewDataFlow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
           # $table->dropColumn('user_id');
           # $table->dropColumn('simulation_id');
            $table->unsignedInteger('workspace_id');
        });

        try {
            Schema::table('jobs', function (Blueprint $table) {
                $table->foreign('workspace_id')
                    ->references('id')
                    ->on('workspaces')
                    ->onDelete('RESTRICT')
                    ->onUpdate('RESTRICT');
            });
        } catch (Exception $e) {
            $this->down();
            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('simulation_id');
            $table->dropColumn('workspace_id');
        });
    }
}
