<?php

namespace App\Http\Controllers;

use App\InspraakVraag;
use Illuminate\Http\Request;

use App\Http\Requests;

class VragenController extends Controller
{
    public function genereerVragen($aantal_vragen){
      $vraag = new InspraakVraag();

      $random_vragen = $vraag->getRandomVragen($aantal_vragen);

      return response()->json($random_vragen);
    }
    
    public function getAllJson($fase_id)
  {
    $inspraakVraag = new InspraakVraag();
    $myInspraakVraag = $inspraakVraag->getByFase($fase_id);
    return response()->json($myInspraakVraag);
  }
    
     public function create(Request $request)
  {
    $InspraakVraag = new InspraakVraag();

    

    $vraag = $project->getAll();
    return view('admin/project/project', ['title' => 'Nieuw Project']);
  }
}
