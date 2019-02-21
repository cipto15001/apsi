<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulationParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function up()
    {
        Schema::create('simulation_parameter', function (Blueprint $table) {
            $table->unsignedInteger('simulation_id');
            $table->unsignedInteger('parameter_id');
            $table->timestamps();
        });

        try {
            Schema::table('simulation_parameter', function (Blueprint $table) {
                $table->foreign('simulation_id')
                    ->references('id')
                    ->on('simulations')
                    ->onDelete('RESTRICT')
                    ->onUpdate('RESTRICT');
                $table->foreign('parameter_id')
                    ->references('id')
                    ->on('parameters')
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
        Schema::dropIfExists('simulation_parameter');
    }
}
