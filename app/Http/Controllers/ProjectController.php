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

    return response()->json([
      'project' => $myProject,
      'fases' => $fase->getByProject($projectId),
      'media' => $media->getByProject($projectId)
    ]);
  }
}
