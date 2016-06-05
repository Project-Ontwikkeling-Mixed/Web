<?php

namespace App\Http\Controllers;

use App\Project as Project;
use App\Fase as Fase;
use App\Gebruiker;
use Validator;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Requests;


class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('admin');
    }

    public function index(Request $request)
    {
      $projectfase = new Fase();

      $projectfases = $projectfase->getAll();

      $message = $request->session()->get('message');

      $request->session()->forget('message');

      return view('admin/index', [
        'title' => 'home',
        'projectfases' => $projectfases,
        'message' => $message
      ]);

    }
    
    public function searchUser(Request $request){
        
        $validated = Validator::make($request->all(), [
          'gebruiker' => 'required|min:2'
        ]);

        
        $zoekResultaten = array();
        $zoekResultatenObjecten = new \stdClass();
       
            
        $gebruiker = new Gebruiker;
        
        $gebruikersNaam = $request->input('gebruiker');
        if(!$validated->fails()){
            $zoekResultatenObjecten = $gebruiker->getByName($gebruikersNaam);

            foreach($zoekResultatenObjecten as $object)
            {
                $zoekResultaten[] = (array) $object;
            }
            
            
            var_dump($zoekResultaten);
            var_dump($zoekResultatenObjecten);
        }
        
        
        return view('admin/index', [
            'title' => 'home',
            'zoekResultaten' => $zoekResultaten
          ])->withErrors($validated);
        
       
    }
    
    public function deleteUser($id, Request $request){
        
        $gebruiker = new Gebruiker();
        $userId = $id;    
        $gebruiker->deleteGebruiker($userId);

        return redirect('/admin');
        
    }
    
    public function toggleAdminRights($id){
        $gebruiker = new Gebruiker();
        $userId = $id;
        
        if( $gebruiker->isAdmin($id)){
            $gebruiker->updateGebruiker($userId,[
                'isAdmin' => 0
            ]);
        }
        else
        {
            $gebruiker->updateGebruiker($userId,[
                'isAdmin' => 1
            ]);
        }
        
        return redirect('/admin');
    }
        

}
