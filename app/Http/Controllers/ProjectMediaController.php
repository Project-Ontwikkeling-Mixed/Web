<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Media;

class ProjectMediaController extends Controller
{
    public function getJson()
    {
      $media = new Media();
      return response()->json($media->getAll());
    }

    public function create($fase_id, Request $request){
      $media = new Media();

      $media->createNew([
        'link' => $request->input('link'),
        'type' => $request->input('type')[0],
        'fase_id' => $fase_id
      ]);

      return redirect('/admin');
    }
}
