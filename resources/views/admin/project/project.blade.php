@extends ('layouts.admin')

@section('content')
  <div id="project-page" data-id='{{ $id }}' >
    <!--
    <div v-for="proj in project">
      <h1>@{{ proj.project.naam }}</h1>
      <p>
        @{{ proj.project.beschrijving }}
      </p>
    </div>
    -->
    <div>
      <h1>{{ $project->naam }}</h1>
      <p>
        {{ $project->beschrijving }}
      </p>
    </div>

    <div class="spacer"></div>

    <div class="btn-group">
      <button type="button" class="btn btn-default" id="nieuw-project-fase">
        Nieuwe gebeurtenis/fase
      </button>
      <!-- <span v-if="fases.length > 0"> -->
        <!-- <button v-for="fase in proj.fases" type="button" class="btn btn-default" id="@{{ fase.id }}">@{{ fase.naam }}</button> -->
        @foreach($fases as $fase)
          <button type="button" class="btn btn-default" id="{{ $fase->id }}" v-model="fase">{{ $fase->naam }}</button>
        @endforeach

      <!-- </span> -->
    </div>

    <div class="spacer"></div>
    <form class="" action="/admin/project/@{{ fase }}" method="post">

    </form>
    <div class="form-group">
      <label for="naam">Naam</label>
      <input type="text" class="form-control" name="naam" placeholder="Typ fasenaam hier">
    </div>
    <div class="form-group">
      <div><label for="beschrijving">Beschrijving</label></div>
      <div>
        <textarea class="form-control" name="beschrijving" rows="8" cols="40" placeholder="Typ fasebeschrijving hier"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="begin">Begin</label>
          <input type="date" class="form-control" name="begin" placeholder="Typ begin van fase">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="einde">Einde</label>
          <input type="date" class="form-control" name="einde" placeholder="Typ einde van fase">
        </div>
      </div>
    </div>
    <div class="form-group">
      <input type="submit" name="name" class="btn btn-primary" value="Project fase toevoegen">
    </div>

  </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/Admin/project-fases.js')}}"></script>
@endsection
