<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectGebeurtenisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_gebeurtenis', function(Blueprint $table){
          $table->increments('id');
          $table->string('naam');
          $table->text('beschrijving');
          $table->integer('project_id')->unsigned();
          $table->foreign('project_id')
            ->references('id')
            ->on('project_fase');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_gebeurtenis');
    }
}
