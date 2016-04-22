<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectFaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_fase', function(Blueprint $table){
          $table->increments('id');
          $table->string('naam');
          $table->datetime('begin');
          $table->datetime('einde');
          /*
           0 staat voor volledige datum,
           1 staat voor precisie op maand,
           2 staat voor precisie op het jaartal
          */
          $table->integer('datum_precisie');
          $table->integer('project_id')->unsigned();
          $table->foreign('project_id')
            ->references('id')
            ->on('project');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_fase');
    }
}
