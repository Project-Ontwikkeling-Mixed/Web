<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project as Project;
use App\Fase as Fase;
use App\Media as Media;

class ProjectController extends Controller
{
  public function allJson(){
    $project = new Project();
    return response()->json($project->getAll());
  }

  public function getProjectJson($id){
    $project = new Project();
    $fase = new Fase();
    $media = new Media();

    $myProject = $project->getById($id);

    $projectId = $myProject[0]->id;



    return response()->json(
      array(
        "id" => $myProject[0]->id,
        "naam" => $myProject[0]->naam,
        "beschrijving" => $myProject[0]->beschrijving,
        "locatie" => $myProject[0]->locatie,
        "media" => $media->getByProject($projectId),
        "fases" => $fase->getByProject($projectId)
      )
    );
  }
}
