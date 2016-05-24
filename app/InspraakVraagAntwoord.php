<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspraakVraagAntwoord extends Model
{
    protected $table = "inspraakvraag_antwoord";

    protected $primaryKey = "id";

    function inspraakvraagantwoord(){
      return $this->belongsTo('App\InspraakVraag', 'id');
    }

    public function chooseAnswer($answer_id){
      return DB::table('inspraakvraag_antwoord')->increment('aantal_gekozen');
    }
}
