<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('project_media', function(Blueprint $table){
        $table->increments('id');
        $table->string('link');
        $table->string('type');
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
        Schema::drop('project_media');
    }
}
