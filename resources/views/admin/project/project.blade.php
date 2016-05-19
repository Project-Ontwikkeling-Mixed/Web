@extends ('layouts.admin')

@section('content')
  <div id="project-page" data-id='{{ $id }}' >
    <a href="/project/delete/{{ $id }}" class="btn btn-red">Project verwijderen</a>
    <a href="/project/update/{{ $id }}" class="btn btn-primary">Project Aanpassen</a>
    <div>
      <h1>@{{ project.naam }}</h1>
      <p>
        @{{ project.beschrijving }}
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

        <div class="form-group{{ $errors->has('naam') ? ' has-error' : '' }}">
          <label for="naam">Naam</label>
          <input type="text" class="form-control" value="@{{ selectedFase.naam }}" name="naam" placeholder="Typ fasenaam hier">
          @if ($errors->has('naam'))
            <span class="help-block">
              <strong>{{ $errors->first('naam') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('beschrijving') ? ' has-error' : '' }}">
          <div><label for="beschrijving">Beschrijving</label></div>
          <div>
            <textarea class="form-control" name="beschrijving" rows="8" cols="40" placeholder="Typ fasebeschrijving hier">@{{ selectedFase.beschrijving }}</textarea>
          </div>
          @if ($errors->has('beschrijving'))
            <span class="help-block">
              <strong>{{ $errors->first('beschrijving') }}</strong>
            </span>
          @endif
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group{{ $errors->has('begin') ? ' has-error' : '' }}">
              <label for="begin">Begin</label>
              <div class='input-group date' id='begin'>
                    <input type='text' class="form-control" name="begin" value="@{{ selectedFase.begin }}" placeholder="Typ begin van fase"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                @if ($errors->has('begin'))
                  <span class="help-block">
                    <strong>{{ $errors->first('begin') }}</strong>
                  </span>
                @endif
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group{{ $errors->has('einde') ? ' has-error' : '' }}">
              <label for="einde">Einde</label>
              <div class='input-group date' id='einde'>
                    <input type='text' class="form-control" name="einde" value="@{{ selectedFase.einde }}" placeholder="Typ het einde van fase"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                @if ($errors->has('einde'))
                  <span class="help-block">
                    <strong>{{ $errors->first('einde') }}</strong>
                  </span>
                @endif
            </div>
          </div>
        </div>

        <input type="submit" name="name" class="btn btn-primary" value="Project fase toevoegen/aanpassen">

        <span v-if="selectedFase.id != 'new'">
          <a href="/fase/delete/@{{ selectedFase.id }}" class="btn btn-red">Project fase verwijderen</a>
        </span>

      </form>

      <div class="spacer"></div>

      <form v-if="selectedFase.id != 'new'" action="/media/@{{ selectedFase.id }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label for="">Upload een media item</label>
        <div class="spacer">

        </div>
        <div class="form-group">
          <label>
            <input type="radio" name="uploadType" v-model="type" value="youtube"> Youtube link
          </label>
          <label>
            <input type="radio" name="uploadType" v-model="type" value="image"> Afbeelding
          </label>
          <label>
            <input type="radio" name="uploadType" v-model="type" value="video"> Video
          </label>
        </div>
        <div class="form-group">
          <div v-if="type == 'youtube'">
            <input type="text" class="form-control" name="link" placeholder="Plaats Youtube link hier">
          </div>
          <div v-if="type == 'image' || type == 'video'">
            <input type="file" name="file">
          </div>
          <div v-if="type == null">
            <p>
              Geen media soort gekozen
            </p>
          </div>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Media toevoegen aan fase">
        </div>
      </form>

    </div>
  @endsection

  @section('scripts')
    <script type="text/javascript" src="{{ asset('js/vendor/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vendor/datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/Admin/project-fases.js') }}"></script>
  @endsection
