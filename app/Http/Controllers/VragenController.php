<?php

namespace App\Http\Controllers;

use App\InspraakVraag;
use App\InspraakVraagAntwoord;
use Illuminate\Http\Request;

use App\Http\Requests;
use SoapBox\Formatter\Formatter;

class VragenController extends Controller
{
  public function genereerVragen($aantal_vragen){
    $vraag = new InspraakVraag();

    $random_vragen = $vraag->getRandomVragen($aantal_vragen);

    return response()->json(array("vragen" => $random_vragen));
  }

  public function getAllJson($fase_id)
  {
    $inspraakVraag = new InspraakVraag();
    $myInspraakVraag = $inspraakVraag->getByFase($fase_id);
    return response()->json($myInspraakVraag);
  }

  public function generateCsv(){
    $question = new InspraakVraag();
    $allQuestionData = $question->getForCsv();

    $formatter = Formatter::make($allQuestionData, Formatter::ARR);
    $csv = $formatter->toCsv();

    header('Content-Disposition: attachment; filename="antwoord_data.csv"');
    header("Cache-control: private");
    header("Content-type: application/force-download");
    header("Content-transfer-encoding: binary\n");

    echo $csv;

    exit;
  }

  public function create(Request $request)
  {

    $inspraakvraag = new InspraakVraag();


    $inspraakvraag_id = $inspraakvraag->createNew([
      'vraag' => $request->input('nieuweVraag'),
      'fase_id' => $request->input('fase_id')
    ]);



    $antwoorden = $request->input('nieuwAntwoord');

    var_dump($antwoorden);



    foreach ($antwoorden as $antwoord)
    {
      $inspraakVraagAntwoord = new InspraakVraagAntwoord();

      $inspraakVraagAntwoord->createNew([
        'antwoord' => $antwoord,
        'inspraakvraag_id' => $inspraakvraag_id
      ]);
    }

    return redirect('/admin');
  }

  public function delete($question_id, Request $request)
  {
    $question = new InspraakVraag();

    if($question->deleteQuestion($question_id))
    {
      return response()->json(["message" => "Inspraakvraag successvol verwijderd"]);
    }else{
      return response()->json(["message" => "Kon de vraag niet verwijderen"]);
    }

  }

  public function allQuestions($fase_id){
    $question = new InspraakVraag();

    $allQuestions = $question->getQuestions($fase_id);
    return response()->json($allQuestions);
  }

  public function answer(Request $request, $answer_id){

    $answer = new InspraakVraagAntwoord();

    $answer->chooseAnswer($answer_id);

    return response()->json(["id" => $answer_id]);
  }
}
