<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkspacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function up()
    {
        Schema::create('workspaces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('manager_id');
            $table->timestamps();
        });

        try {
            Schema::table('workspaces', function (Blueprint $table) {
                $table->foreign('manager_id')
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('workspaces');
    }
}
