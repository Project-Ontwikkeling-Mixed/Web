<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

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
        
        $validated = $this->validate($request, [
            'uploadType' => 'required'
            ]);
        
        
        if ($uploadType =='youtube'){
         
            $media = new Media();
        
            $validated = $this->validate($request, [
            'link' => 'required'
            ]);
            
              $media->createNew([
                'link' => $request->input('link'),
                'type' => $request->input('uploadType'),
                'fase_id' => $fase_id
              ]);
            
            
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
            
            
            
        
              $media->createNew([
                'link' => $filePath,
                'type' => $request->input('uploadType'),
                'fase_id' => $fase_id
              ]);
            
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
            
            
            
        
              $media->createNew([
                'link' => $filePath,
                'type' => $request->input('uploadType'),
                'fase_id' => $fase_id
              ]);
            
        }
//        
//        if($validated->fails()){
//
//            return redirect('/media/'.$fase_id)
//                    ->withErrors($validator)
//                    ->withCookie(cookie('current_id',$fase_id));
//        }
//        
      return redirect('/admin');
    }
}
