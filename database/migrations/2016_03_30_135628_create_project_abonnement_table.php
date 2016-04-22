<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectAbonnementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_abonnement', function(Blueprint $table){
          $table->increments('id');
          $table->integer('project_id')->unsigned();
          $table->integer('gebruiker_id')->unsigned();
          $table->foreign('project_id')
            ->references('id')
            ->on('project');
          $table->foreign('gebruiker_id')
            ->references('id')
            ->on('gebruikers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_abonnement');
    }
}
