<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MatchTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match', function(Blueprint $table){
            $table->increments('id');
            $table->integer('gebruiker_id')->unsigned();
            $table->foreign('gebruiker_id')
              ->references('id')
              ->on('gebruikers');
            $table->integer('tegenstander_id')->unsigned();
            $table->foreign('tegenstander_id')
              ->references('id')
              ->on('gebruikers');
            $table->integer('score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::down('match');
    }
}
