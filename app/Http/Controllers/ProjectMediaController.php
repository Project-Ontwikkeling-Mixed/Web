<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;

use App\Media;

use Input;

class ProjectMediaController extends Controller
{
  public function getJson()
  {
    $media = new Media();
    return response()->json($media->getAll());
  }

  public function create($fase_id, Request $request, Response $response){
    $uploadType = $request->input('uploadType');

    if ($uploadType =='youtube'){

      $media = new Media();

      $media->createNew([
        'link' => $request->input('link'),
        'type' => $request->input('uploadType'),
        'fase_id' => $fase_id
      ]);

      $validated = $this->validate($request, [
        "link" => 'required'
      ]);

      var_dump($media->getProjectIdOfMedia($fase_id));

      return redirect('/project' . $media->getProjectIdOfMedia($fase_id))
              ->withErrors($validated)
              ->withCookie(cookie('fase_id', $fase_id, 30, null, null, false, false));

    } else if($uploadType =='image'){

      $media = new Media();
      $file = Input::file('file');

      $imageName = 'fase-'.$fase_id.'-id-'.$media->id.'-'.$file->getClientOriginalName();

      $file->move('img/catalog/', $imageName);
      $filePath = 'img/catalog/'.$imageName;

      $media->createNew([
        'link' => $filePath,
        'type' => $request->input('uploadType'),
        'fase_id' => $fase_id
      ]);

      $validated = $this->validate($request, [
        "file" => "required"
      ]);

      var_dump($media->getProjectIdOfMedia($fase_id));

      return redirect('/project' . $media->getProjectIdOfMedia($fase_id))
              ->withErrors($validated)
              ->withCookie(cookie('fase_id', $fase_id, 30, null, null, false, false));
    }

    return redirect('/admin');
  }
}
