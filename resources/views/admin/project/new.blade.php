@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-3 admin-opties-menu">
      <div class="admin-optie"><a href="{{ url('/admin/project/new') }}">Nieuw Project</a></div>
    </div>
    <div class="col-md-9 admin-content-area">
      <form class="project-form" action="{{ url('/admin/project/new') }}" method="post">
        <div class="form-group">
          <label for="naam">Naam Project</label>
          <input type="text" name="naam" class="form-control" placeholder="Typ hier de naam van het project">
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
