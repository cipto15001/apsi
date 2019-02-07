<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_number');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('simulation_id');
            $table->string('name');
            $table->enum('status', [
                'draft', 'running', 'canceled', 'finished', 'queued',
            ]);
            $table->text('parameters');
            $table->text('out')->nullable();
            $table->text('log')->nullable();
            $table->string('key');
            $table->timestamps();
            $table->softDeletes();
        });

        try {
            Schema::table('jobs', function (Blueprint $table) {
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('RESTRICT')
                    ->onUpdate('RESTRICT');
                $table->foreign('simulation_id')
                    ->references('id')
                    ->on('simulations')
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
        Schema::dropIfExists('jobs');
    }
}
