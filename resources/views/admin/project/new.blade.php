@extends('layouts.admin')

@section('content')

<form class="project-form" action="{{ url('/admin/project/new') }}" method="post">
  {!! csrf_field() !!}
  <div class="form-group">
    <label for="naam">Naam Project</label>
    <input type="text" name="naam" class="form-control" placeholder="Typ hier de naam van het project">
  </div>
  <div class="form-group">
    <label for="beschrijving">Beschrijving project</label>
    <textarea rows="5" name="beschrijving" class="form-control" placeholder="Typ hier de naam van het project"></textarea>
  </div>
    <div class="form-group">
    <label for="locatie">Locatie project</label>
    <p id=locatie-status></p>
    Kies een locatie
    <div class="spacer"></div>
    <div id="admin-map"></div>
    <input id="locatie-input" type="hidden" name="locatie">

  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Maak Project">
  </div>
</form>

@endsection

@section('scripts')
  <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
  <script src="http://maps.google.com/maps/api/js"></script>
  <script src="{{ asset('js/vendor/gmaps.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/UI/google-maps-config.js') }}"></script>
@endsection
