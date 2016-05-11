<?php

namespace App\Http\Controllers;

use App\Project as Project;
use App\Fase as Fase;

use Illuminate\Http\Request;
use App\Http\Requests;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('admin');
    }

    public function index()
    {
      $projectfase = new Fase();

      $projectfases = $projectfase->getAll();

      return view('admin/index', [
        'title' => 'home',
        'projectfases' => $projectfases
      ]);
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
        $naam = $request->input('naam');
        $beschrijving = $request->input('beschrijving');
        $locatie = $request->input('locatie');

        $project->createNew($naam, $beschrijving, $locatie);

        return redirect('admin/');
      }

      $projecten = $project->getAll();
      return view('admin/project/new', ['projecten' => $projecten, 'title' => 'Nieuw Project']);
    }

    public function get($id, Request $request){
      //$project = new Project();
      //$thisProject = $project->getById($id);
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
}
