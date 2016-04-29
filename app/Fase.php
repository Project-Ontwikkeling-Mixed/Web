<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    public function getAll()
    {
      return DB::table('project_fase')->get();
    }

    public function createNew($naam, $begin, $einde, $datum, $project_id){
      return DB::table('project_fase')->insert([
        'naam' => $naam,
        'begin' => $begin,
        'einde' => $einde,
        'datum_precisie' => $datum,
        'project_id' => $project_id
      ]);
    }

    public function getByProject($id){
      return DB::table('project_fase')->where('project_id', $id)->get();
    }
}
