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

    public function allQuestions($fase_id){
      $question = new InspraakVraag();

      $allQuestions = $question->getQuestions($fase_id);
      return response()->json($allQuestions);
    }

    public function answer($answer_id){
      $answer = new InspraakVraagAntwoord();

      $answer->chooseAnswer($answer_id);
    }
}
