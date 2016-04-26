@extends('layouts.admin')

@section('content')

<form class="project-form" action="{{ url('/admin/project/new') }}" method="post">
  {!! csrf_field() !!}
  <div class="form-group">
    <label for="naam">Naam Project</label>
    <input type="text" name="naam" class="form-control" placeholder="Typ hier de naam van het project">
  </div>
  <div class="form-group">
    <label for="naam">Beschrijving project</label>
    <textarea rows="5" name="beschrijving" class="form-control" placeholder="Typ hier de naam van het project"></textarea>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Maak Project">
  </div>
</form>

@endsection
