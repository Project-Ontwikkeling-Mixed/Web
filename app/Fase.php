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

    public function createNew($fase){
      return DB::table('project_fase')->insert($fase);
    }

    public function getFaseById($id)
    {
      return DB::table('project_fase')
      ->where('id', $id)
      ->get();
    }

    public function getByProject($id){
      return DB::table('project_fase')
      ->where('project_id', $id)
      ->get();
    }

    public function updateFase($id, $fase)
    {
      return DB::table('project_fase')->where('id', $id)->update($fase);
    }
}
