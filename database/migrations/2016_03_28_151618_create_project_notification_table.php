<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_notificatie', function(Blueprint $table){
          $table->increments('id');
          $table->string('bericht');
          $table->integer('project_id')->unsigned();
          $table->foreign('project_id')
            ->references('id')
            ->on('project')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_notificatie');
    }
}
