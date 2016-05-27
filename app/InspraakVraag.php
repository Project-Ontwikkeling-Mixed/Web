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
    
    public function getByFase($id){
      return DB::table('inspraakvraag')
      ->where('fase_id', $id)
      ->get();
    }
}
