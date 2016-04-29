<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project as Project;
use App\Fase as Fase;

class ProjectController extends Controller
{
  public function allJson(){
    $project = new Project();
    return response()->json($project->getAll());
  }

  public function getProjectJson($id){
    $project = new Project();
    $fase = new Fase();

    $myProject = $project->getById($id);

    $projectId =  $myProject[0]->id;

    return response()->json([
      'project' => $myProject,
      'fases' => $fase->getByProject($projectId),
    ]);
  }
}
