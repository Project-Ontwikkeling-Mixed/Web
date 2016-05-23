<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Cookie\CookieJar;
use Validator;

use App\Media;

use Input;

class ProjectMediaController extends Controller
{
  public function getJson()
  {
    $media = new Media();
    return response()->json($media->getAll());
  }

  public function create($fase_id, Request $request){
    $uploadType = $request->input('uploadType');
    $media = new Media();

    $validator = Validator::make($request->all(), [
      'uploadType' => 'required'
    ]);

    if($validator->fails()){
      return redirect('/project/' . $media->getProjectIdOfMedia($fase_id)) 
      ->withErrors($validator)
      ->withCookie('fase_id', $fase_id, 30, null, null, false, false);
    }

    if ($uploadType == 'youtube'){

      $validator = Validator::make($request->all(), [
        "link" => 'required'
      ]);

      if(!$validator->fails()){
        $media->createNew([
          'link' => $request->input('link'),
          'type' => $request->input('uploadType'),
          'fase_id' => $fase_id
        ]);
      }else{
        return redirect('/project/' . $media->getProjectIdOfMedia($fase_id))
        ->withErrors($validator)
        ->withCookie('fase_id', $fase_id, 30, null, null, false, false);
      }

    } else if($uploadType == 'image'){

      $validator = Validator::make($request->all(), [
        "file" => "required"
      ]);

      if(!$validator->fails()){
        $file = $request->input('file');

        $imageName = 'fase-'.$fase_id.'-id-'.$media->id.'-'.$file->getClientOriginalName();

        $file->move('img/catalog/', $imageName);
        $filePath = 'img/catalog/'.$imageName;

        $media->createNew([
          'link' => $filePath,
          'type' => $request->input('uploadType'),
          'fase_id' => $fase_id
        ]);
      }else{
        return redirect('/project/' . $media->getProjectIdOfMedia($fase_id))
        ->withErrors($validator)
        ->withCookie('fase_id', $fase_id, 30, null, null, false, false);
      }
    }

    return redirect('/project/' . $media->getProjectIdOfMedia($fase_id))
    ->withCookie('fase_id', $fase_id, 30, null, null, false, false);
  }
}
