<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspraakvraagAntwoordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspraakvraag_antwoord', function(Blueprint $table){
          $table->increments('id');
          $table->string('antwoord');
          $table->integer('gekozen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::down('inspraakvraag_antwoord');
    }
}
