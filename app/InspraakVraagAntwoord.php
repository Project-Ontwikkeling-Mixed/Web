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
}
