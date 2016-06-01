<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class InspraakVraagAntwoord extends Model
{
    protected $table = "inspraakvraag_antwoord";

    protected $primaryKey = "id";

    function inspraakvraagantwoord(){
      return $this->belongsTo('App\InspraakVraag', 'id');
    }

    public function chooseAnswer($answer_id){
      return DB::table('inspraakvraag_antwoord')
      ->where("id", $answer_id)
      ->increment('aantal_gekozen');
    }
    
    public function createNew($antwoord){
      return DB::table('inspraakvraag_antwoord')->insert($antwoord);
    }
}
