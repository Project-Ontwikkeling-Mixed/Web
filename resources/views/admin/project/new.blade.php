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
    <a id="admin-map-link" href="javascript:void(0)">Klik hier om een locatie aan te duiden op de kaart</a>
    <input id="locatie-input" type="text" name="locatie" hidden>
  </div>
  <div id="admin-map"></div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Maak Project">
  </div>
</form>

<script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
<script src="http://maps.google.com/maps/api/js"></script>
<script src="{{ asset('js/vendor/gmaps.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/UI/google-maps-config.js') }}"></script>



@endsection
