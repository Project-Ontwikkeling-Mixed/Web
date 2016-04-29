<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function getAll(){
      return DB::table('project_media')->get();
    }

    public function getByProject($id)
    {
      return DB::table('project_media')->where('fase_id', $id)->get();
    }

    public function createNew($media)
    {
      return DB::table('project_media')->insert($media);
    }
}
