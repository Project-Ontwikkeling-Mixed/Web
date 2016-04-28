<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function getAll()
    {
      return DB::table('project')->get();
    }

    public function createNew($naam, $beschrijving){
      return DB::table('project')->insert([
        'naam' => $naam,
        'beschrijving' => $beschrijving
      ]);
    }

    public function getById($id){
      return DB::table('project')->find($id);
    }
}
