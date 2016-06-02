<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspraakvraagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspraakvraag', function(Blueprint $table){
          $table->increments('id');
          $table->text('vraag');
          $table->integer('fase_id')->unsigned();
          $table->foreign('fase_id')
            ->references('id')
            ->on('project_fase')
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
        Schema::drop('inspraakvraag');
    }
}
