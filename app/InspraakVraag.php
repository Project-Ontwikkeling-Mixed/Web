<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class InspraakVraag extends Model
{

    protected $table = 'inspraakvraag';

    protected $primaryKey = "id";

    function antwoorden(){
      return $this->hasMany('App\InspraakVraagAntwoord', 'inspraakvraag_id');
    }

    public function getRandomVragen($aantal){

      return $this->with('antwoorden')
              ->orderBy(DB::raw('RAND()'))
              ->take($aantal)
              ->get();
    }

    public function getForCsv(){
      return $this->with('antwoorden')
              ->get();
    }

    public function deleteQuestion($question_id)
    {
      return DB::table('inspraakvraag')
        ->where('id', $question_id)
        ->delete();
    }

    public function getByFase($id){
      return DB::table('inspraakvraag')
      ->where('fase_id', $id)
      ->get();
    }

    public function getQuestions($project_id){
      return $this->with('antwoorden')
              ->where('fase_id', $project_id)
              ->get();
    }

    public function createNew($vraag){
      return DB::table('inspraakvraag')->insertGetId($vraag);
    }
}
