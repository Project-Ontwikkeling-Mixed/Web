<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Fase as Fase;

class ProjectFaseController extends Controller
{
  public function allJson($project_id)
  {
    $fase = new Fase();
    $myFase = $fase->getByProject($project_id);
    return response()->json($myFase);
  }

  public function create(Request $request)
  {
    $fase = new Fase();
    $project_id = $request->input('project_id');


    $fase->createNew([
      'naam' => $request->input('naam'),
      'beschrijving' => $request->input('beschrijving'),
      'begin' => $request->input('begin'),
      'einde' => $request->input('einde'),
      'project_id' => $request->input('project_id')
    ]);

    return redirect('project/' . $project_id);
  }

  public function update($fase_id, Request $request)
  {
    $fase = new Fase();

    $fase->updateFase($fase_id,[
      'naam' => $request->input('naam'),
      'beschrijving' => $request->input('beschrijving'),
      'begin' => $request->input('begin'),
      'einde' => $request->input('einde'),
    ]);

    $project_id = $request->input('project_id');
    return redirect('project/' . $project_id);
  }

}
