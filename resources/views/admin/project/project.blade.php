@extends ('layouts.admin')

@section('content')
  <div id="project-page" data-id='{{ $id }}' >
    <div v-for="proj in project.project">
      <h1>@{{ proj.naam }}</h1>
      <p>
        @{{ proj.beschrijving }}
      </p>
    </div>

    <div class="spacer"></div>

    <div class="btn-group">
      <button type="button" class="btn btn-default" id="nieuw-project-fase" v-on:click="nieuwProject">
        Nieuwe gebeurtenis/fase
      </button>
      <span v-if="project.fases.length > 0">
        <button v-for="fase in project.fases" type="button" class="btn btn-default" v-on:click="tabFase" id="@{{ fase.id }}">@{{ fase.naam }}</button>
      </span>
    </div>

    <div class="spacer"></div>
      <form action="/fase/@{{ selectedFase.id }}" method="post">

        {!! csrf_field() !!}
        <input type="hidden" name="project_id" value="{{ $id }}">

        <div class="form-group">
          <label for="naam">Naam</label>
          <input type="text" class="form-control" value="@{{ selectedFase.naam }}" name="naam" placeholder="Typ fasenaam hier">
        </div>
        <div class="form-group">
          <div><label for="beschrijving">Beschrijving</label></div>
          <div>
            <textarea class="form-control" name="beschrijving" rows="8" cols="40" placeholder="Typ fasebeschrijving hier">@{{ selectedFase.beschrijving }}</textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="begin">Begin</label>
              <input type="datetime" class="form-control" name="begin" value="@{{ selectedFase.begin }}" placeholder="Typ begin van fase">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="einde">Einde</label>
              <input type="datetime" class="form-control" name="einde" value="@{{ selectedFase.einde }}"placeholder="Typ einde van fase">
            </div>
          </div>
        </div>
        <div class="form-group">
          <input type="submit" name="name" class="btn btn-primary" value="Project fase toevoegen/aanpassen">
        </div>
      </form>
      <form v-if="selectedFase.id != 'new'" action="/media/@{{ selectedFase.id }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
          <label>
            <input type="radio" name="type[]" v-model="type" value="youtube"> Youtube link
          </label>
          <label>
            <input type="radio" name="type[]" v-model="type" value="image"> Afbeelding
          </label>
          <label>
            <input type="radio" name="type[]" v-model="type" value="video"> Video
          </label>
        </div>
        <div class="form-group">
          <div v-if="type == 'youtube'">
            <input type="text" class="form-control" name="link" placeholder="Plaats Youtube link hier">
          </div>
          <div v-else>
            <input type="file" name="file">
          </div>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Media toevoegen aan fase">
        </div>
      </form>

    </div>
  @endsection

  @section('scripts')
    <script type="text/javascript" src="{{ asset('js/Admin/project-fases.js')}}"></script>
  @endsection
