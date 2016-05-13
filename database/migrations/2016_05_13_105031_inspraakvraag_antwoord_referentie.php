<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InspraakvraagAntwoordReferentie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('inspraakvraag_antwoord', function(Blueprint $table){
        $table->integer('inspraakvraag_id')->unsigned();
        $table->foreign('inspraakvraag_id')
              ->references('id')
              ->on('inspraakvraag');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
