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
      if($media['type'] == 'youtube'){
        $link = explode('/', $media['link']);
        $link = "http://www.youtube.be/embed/" . substr(array_pop($link), 8);
      }else if($media['type'] == 'image'){
        $link = $media['link'];
      }

      return DB::table('project_media')->insert([
        'link' => $link,
        'type' => $media['type'],
        'fase_id' => $media['fase_id']
      ]);

    }
}
