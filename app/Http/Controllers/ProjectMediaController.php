<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Cookie\CookieJar;
use Validator;

use App\Media;
use Symfony\Component\HttpFoundation\Session\Session;

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

<<<<<<< HEAD

    public function create($fase_id, Request $request){
        $uploadType = $request->input('uploadType');

        $validated = $this->validate($request, [
            'uploadType' => 'required'
            ]);


        if ($uploadType =='youtube'){

            $media = new Media();

            $validated = $this->validate($request, [
            'link' => 'required'
            ]);

=======
<<<<<<< HEAD
    public function create($fase_id, Request $request){
        $uploadType = $request->input('uploadType');
        
        $validated = $this->validate($request, [
            'uploadType' => 'required'
            ]);
        
        
        if ($uploadType =='youtube'){
         
            $media = new Media();
        
            $validated = $this->validate($request, [
            'link' => 'required'
            ]);
            
>>>>>>> 99893ad9059b622e18a9bcf7d661ee79570088ef
              $media->createNew([
                'link' => $request->input('link'),
                'type' => $request->input('uploadType'),
                'fase_id' => $fase_id
              ]);
<<<<<<< HEAD


        }
        elseif($uploadType =='image'){

            $validated = $this->validate($request, [
            'file' => 'required'
            ]);

            $media = new Media();

            $file = Input::file('file');

            $imageName = 'fase-'.$fase_id.'-id-'.$media->id.'-'.$file->getClientOriginalName();


            $file->move('img/catalog/', $imageName);

            $filePath = 'img/catalog/'.$imageName;




=======
            
            
        } 
        elseif($uploadType =='image'){
            
            $validated = $this->validate($request, [
            'file' => 'required'
            ]);
            
            $media = new Media();
        
            $file = Input::file('file');
            
            $imageName = 'fase-'.$fase_id.'-id-'.$media->id.'-'.$file->getClientOriginalName();
        
            
            $file->move('img/catalog/', $imageName);
            
            $filePath = 'img/catalog/'.$imageName;
            
            
            
        
>>>>>>> 99893ad9059b622e18a9bcf7d661ee79570088ef
              $media->createNew([
                'link' => $filePath,
                'type' => $request->input('uploadType'),
                'fase_id' => $fase_id
              ]);
<<<<<<< HEAD

        }
        elseif($uploadType =='video'){

            $validated = $this->validate($request, [
            'file' => 'required'
            ]);

            $media = new Media();

            $file = Input::file('file');

            $imageName = 'fase-'.$fase_id.'-id-'.$media->id.'-'.$file->getClientOriginalName();


            $file->move('video/catalog/', $imageName);

            $filePath = 'video/catalog/'.$imageName;




=======
            
        }
        elseif($uploadType =='video'){
            
            $validated = $this->validate($request, [
            'file' => 'required'
            ]);
            
            $media = new Media();
        
            $file = Input::file('file');
            
            $imageName = 'fase-'.$fase_id.'-id-'.$media->id.'-'.$file->getClientOriginalName();
        
            
            $file->move('video/catalog/', $imageName);
            
            $filePath = 'video/catalog/'.$imageName;
            
            
            
        
>>>>>>> 99893ad9059b622e18a9bcf7d661ee79570088ef
              $media->createNew([
                'link' => $filePath,
                'type' => $request->input('uploadType'),
                'fase_id' => $fase_id
              ]);
<<<<<<< HEAD

        }
//
=======
            
        }
//        
>>>>>>> 99893ad9059b622e18a9bcf7d661ee79570088ef
//        if($validated->fails()){
//
//            return redirect('/media/'.$fase_id)
//                    ->withErrors($validator)
//                    ->withCookie(cookie('current_id',$fase_id));
//        }
<<<<<<< HEAD
//
=======
//        
>>>>>>> 99893ad9059b622e18a9bcf7d661ee79570088ef
      return redirect('/admin');
=======
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
        $file = Input::file("file");

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
>>>>>>> 8e98ab14e5cb33234b9ac5d43081ab0e1584d86d
    }

    return redirect('/project/' . $media->getProjectIdOfMedia($fase_id))
    ->withCookie('fase_id', $fase_id, 30, null, null, false, false);
  }
}
