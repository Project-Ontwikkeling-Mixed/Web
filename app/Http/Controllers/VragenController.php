<?php

namespace App\Http\Controllers;

use App\InspraakVraag;
use App\InspraakVraagAntwoord;
use Illuminate\Http\Request;

use App\Http\Requests;

class VragenController extends Controller
{
    public function genereerVragen($aantal_vragen){
      $vraag = new InspraakVraag();

      $random_vragen = $vraag->getRandomVragen($aantal_vragen);

      return response()->json($random_vragen);
    }
<<<<<<< HEAD
    
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
=======

    public function allQuestions($fase_id){
      $question = new InspraakVraag();

      $allQuestions = $question->getQuestions($fase_id);
      return response()->json($allQuestions);
    }

    public function answer($answer_id){
      $answer = new InspraakVraagAntwoord();

      $answer->chooseAnswer($answer_id);
    }
>>>>>>> 8e98ab14e5cb33234b9ac5d43081ab0e1584d86d
}
