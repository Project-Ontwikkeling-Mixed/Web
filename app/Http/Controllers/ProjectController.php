<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

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

  /*
  Als er een POST word verzonden steek dan waarden van formulier in database
  Als er geen POST is verzonden toon dan de creatie-pagina.
  */
  public function create(Request $request)
  {
    $project = new Project();
    $projectfase = new Fase();

    if($request->isMethod('post')){

      $this->validate($request, [
        'naam' => 'required',
        'beschrijving' => 'required',
        'locatie' => 'required'
      ]);

      $naam = $request->input('naam');
      $beschrijving = $request->input('beschrijving');
      $locatie = $request->input('locatie');

      $project->createNew($naam, $beschrijving, $locatie);

      return redirect('admin/');
    }

    $projecten = $project->getAll();
    return view('admin/project/new', ['projecten' => $projecten, 'title' => 'Nieuw Project']);
  }

  public function update($project_id, Request $request)
  {
    $fase = new Project();

    $fase->updateProject($project_id,[
      'naam' => $request->input('naam'),
      'beschrijving' => $request->input('beschrijving'),
      'locatie' => $request->input('locatie')
    ]);

    $project_id = $request->input('project_id');
    return redirect('project/' . $project_id);
  }

  public function getUpdate($project_id)
  {
    $project = new Project();
    $projecten = $project->getById($project_id);
    return view('admin/project/update', ['id' => $project_id, 'title' => 'Update Project', 'project' => $projecten]);
  }

  public function get($id, Request $request){
    $project = new Project();
    $fase = new Fase();

    $projecten = $project->getById($id);
    $fases = $fase->getByProject($id);

    return view('admin/project/project', [
      'id' => $id,
      'title' => 'Project',
      'project' => $projecten[0],
      'fases' => $fases
    ]);
  }

  public function delete($project_id, Request $request)
  {
    $fase = new Project();
    $fase->deleteProject($project_id);

    $request->session()->put('message', 'Project succesvol verwijderd');
    return redirect('admin/');
  }
}
