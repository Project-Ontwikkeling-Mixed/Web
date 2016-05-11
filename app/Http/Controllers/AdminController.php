<?php

namespace App\Http\Controllers;

use App\Project as Project;
use App\Fase as Fase;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Requests;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('admin');
    }

    public function index(Request $request)
    {
      $projectfase = new Fase();

      $projectfases = $projectfase->getAll();

      $message = $request->session()->get('message');

      $request->session()->forget('message');

      return view('admin/index', [
        'title' => 'home',
        'projectfases' => $projectfases,
        'message' => $message
      ]);

    }

    

}
