<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Fase as Fase;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Response;
use Illuminate\Cookie\CookieJar;

use Validator;

class ProjectFaseController extends Controller
{
  public function allJson($project_id)
  {
    $fase = new Fase();
    $myFase = $fase->getByProject($project_id);
    return response()->json($myFase);
  }

  public function getFaseJson($fase_id){
    $fase = new Fase();
    $myFase = $fase->getFaseById($fase_id);
    return response()->json($myFase);
  }

  public function create(Request $request)
  {
    $validated = Validator::make($request->all(), [
      'naam' => 'required',
      'beschrijving' => 'required',
      'begin' => 'required',
      'einde' => 'required|greater_than_field:begin',
      'project_id' => 'required'
    ]);

    $project_id = $request->input('project_id');

    $fase = new Fase();
    $fase->createNew([
      'naam' => $request->input('naam'),
      'beschrijving' => $request->input('beschrijving'),
      'begin' => $request->input('begin'),
      'einde' => $request->input('einde'),
      'project_id' => $project_id
    ]);

    return redirect('project/' . $project_id)->withErrors($validated);

  }

  public function update($fase_id, Request $request)
  {
    $fase = new Fase();

    $validated = Validator::make($request->all(), [
      'naam' => 'required',
      'beschrijving' => 'required',
      'begin' => 'required',
      'einde' => 'required|greater_than_field:begin',
      'project_id' => 'required'
    ]);

    if(!$validated->fails()){
      $fase->updateFase($fase_id,[
        'naam' => $request->input('naam'),
        'beschrijving' => $request->input('beschrijving'),
        'begin' => $request->input('begin'),
        'einde' => $request->input('einde'),
      ]);
    }


    $project_id = $request->input('project_id');

    return redirect('project/' . $project_id)
    ->withErrors($validated)
    ->withCookie('fase_id', $fase_id, 30, null, null, false, false);
  }

  public function delete($fase_id, Request $request)
  {
    $fase = new Fase();
    $fase->deleteFase($fase_id);

    $request->session()->put('message', 'Project fase succesvol verwijderd');
    return redirect('admin/');
  }

  public function getCurrent($project_id)
  {
    $fase = new Fase();
    $currentFase = $fase->getActiveByProject($project_id);

    return response()->json($currentFase);
  }

}
