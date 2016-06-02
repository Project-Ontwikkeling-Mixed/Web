@extends ('layouts.admin')

@section('content')
  <div id="project-page" data-id='{{ $id }}' >
    <div class="btn-group">
      <a href="/project/delete/{{ $id }}" class="btn btn-red">Project verwijderen</a>
      <a href="/project/update/{{ $id }}" class="btn btn-primary">Project Aanpassen</a>
    </div>
    <div class="project-title">
      <h1>@{{ project.naam }}</h1>
      <p>
        @{{ project.beschrijving }}
      </p>
    </div>

    <div class="big-spacer"></div>

    <div class="btn-group">
      <button type="button" class="btn btn-default btn-darker" id="nieuw-project-fase" v-on:click="nieuwProject">
        Nieuw
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

      <span v-if="selectedFase.id != 'new'">
        <input type="submit" name="name" class="btn btn-primary" value="Project fase aanpassen">
      </span>

      <span v-if="selectedFase.id == 'new'">
        <input type="submit" name="name" class="btn btn-primary" value="Project fase toevoegen">
      </span>

      <span v-if="selectedFase.id != 'new'">
        <a href="/fase/delete/@{{ selectedFase.id }}" class="btn btn-red">Project fase verwijderen</a>
      </span>

    </form>

    <div class="spacer"></div>

    <form v-if="selectedFase.id != 'new'" action="/media/@{{ selectedFase.id }}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <h5>Upload een media item</h5>
      <div class="spacer">

      </div>
      <div class="form-group{{ $errors->has('uploadType') ? ' has-error' : '' }}">
        <label>
          <input type="radio" name="uploadType" v-model="type" value="youtube"> Youtube link
        </label>
        <label>
          <input type="radio" name="uploadType" v-model="type" value="image"> Afbeelding
        </label>
        @if ($errors->has('uploadType'))
          <span class="help-block">
            <strong>{{ $errors->first('uploadType') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
        <div v-if="type == 'youtube'">
          <input type="text" class="form-control" name="link" placeholder="Plaats Youtube link hier">
          @if ($errors->has('link'))
            <span class="help-block">
              <strong>{{ $errors->first('link') }}</strong>
            </span>
          @endif
        </div>
        <div v-if="type == 'image'">
          <input type="file" name="file">
        </div>
        <div v-if="type == null">
          <p>
            Geen media soort gekozen
          </p>
        </div>

      <div class="spacer"></div>

      @if ($errors->has('file'))
        <span class="help-block">
          <strong>{{ $errors->first('file') }}</strong>
        </span>
      @endif
      @if ($errors->has('link'))
        <span class="help-block">
          <strong>{{ $errors->first('link') }}</strong>
        </span>
      @endif
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Media toevoegen aan fase">
    </div>
  </form>

  <div class="spacer"></div>

  <div v-if="selectedFase.id != 'new'">
    <h5>Inpsraakvragen beheren</h5>
      
    <div  v-if="!nieuweVraag" class="row nieuwe-vraag">
        <a v-on:click="openQuestionSection()">Nieuwe inspraakvraag aanmaken</a>
    </div>
    <div  v-if="nieuweVraag" class="row nieuwe-vraag nieuwe-vraag-geopend">
        <a v-on:click="closeQuestionSection()">Geen nieuwe inspraakvraag aanmaken</a>
    </div>
    <div v-if="nieuweVraag" class="row nieuwe-vraag-sectie">
        <form action="/vraag/new" method="post">
            {!! csrf_field() !!}
            
            <input type="hidden" name="fase_id" value="@{{ selectedFase.id }}">
            
            <div class="form-group">
                <label>Nieuwe Vraag</label>                
                <input type="text" class="form-control" name="nieuweVraag" placeholder="Typ hier je nieuwe vraag">
            </div>
            
            <div class="form-group">
                <label>Mogelijke antwoorden</label>
                <input v-for="n in extraAntwoordTeller" type="text" class="form-control" ame="nieuwAntwoord[@{{$index}}]" placeholder="Typ hier antwoord @{{$index+1}}">
            </div>
            
            
            
            <div class="link-toevoegen">
                <a v-on:click="extraAntwoordToevoegen()">Antwoord Toevoegen</a>
            </div>
            <div class="link-verwijderen">
                <a v-on:click="extraAntwoordVerwijderen()">Antwoord Verwijderen</a>
            </div>
            
            
            <input type="submit" name="name" class="btn btn-primary" value="Nieuwe vraag aanmaken">
            
            
        </form>
    </div>
    
    <div class="row huidige-vraag">
        Huidige inspraakvragen
    </div>
    <div class="row vragen-sectie">
      <div class="col-md-8" class="vragen-menu">
        <ul>
          <li v-for="question in questions">
            <a class="vragen-menu-item" v-on:click="chooseAnswer($index)">
              @{{ question.vraag }}
            </a>
          </li>
        </ul>
      </div>
      <div class="col-md-4">
        <div class="answers-holder">
          <div v-for="answer in questions[id].antwoorden">
            <div class="answer">
              <b>@{{ answer.antwoord }}</b> - <i>@{{ answer.aantal_gekozen }}</i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/vendor/moment.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/vendor/datetimepicker.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/Admin/project-fases.js') }}"></script>
@endsection
