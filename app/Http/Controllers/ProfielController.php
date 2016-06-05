<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Gebruiker;
use Auth;
use Validator;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Response;

class ProfielController extends Controller
{
    public function index()
    {
        if(Auth::guest()){
            return view('welcome');
        } 
        else
        {
            return view('profiel');
        }
    }
    
    public function update(Request $request)
    {
        $validated = Validator::make($request->all(), [
          'voornaam' => 'required',
          'achternaam' => 'required',
          'email' => 'required'
        ]);
        
        $userId = Auth::id();
                
        $gebruiker = new Gebruiker();
        $noError = false;
        
        if(!$validated->fails()){
            $gebruiker->updateGebruiker($userId,[
                'voornaam' => $request->input('voornaam'),
                'achternaam' => $request->input('achternaam'),
                'email' => $request->input('email')
            ]);
            $noError = true;
        }
        
        
        
        if ($request->input('nieuwWachtwoord')!= '' || $request->input('herhNieuwWachtwoord')!= '') {
            if ($request->input('nieuwWachtwoord') == $request->input('herhNieuwWachtwoord')){
                $gebruiker->updateGebruiker($userId,[
                    'password' => bcrypt($request->input('nieuwWachtwoord'))
                ]);
                $noError=true;
            }else{
                $noError=false;
            }
        }
        
                
        return view('profiel',[
        'noError' => $noError
        ])->withErrors($validated);
    }
    
    public function delete(Request $request)
  {
    $gebruiker = new Gebruiker();
    $userId = Auth::id();    
    $gebruiker->deleteGebruiker($userId);

    return redirect('/');
  }
}
