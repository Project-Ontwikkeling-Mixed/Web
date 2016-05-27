@extends('layouts.app')

@section('content')
  <div class="container" id="home-page">
    <div class="row kies-project-box">
      Kies een project van de kaart
    </div>
    <div class="row map-box">
      <div class="col-md-3">
        <div class="col-md-12 map-holder"></div>
      </div>
    </div>
    <div>
      <div class="row project-title">
        <div class="col-md-10">
          <h1>@{{ project.naam }}</h1>
        </div>
        <div class="col-md-2">
          <button class="btn-project horizontal-center"><span class="icon-abonnement"></span> Abonneer</button>
        </div>
      </div>
      <div class="row project-holder">
        <div class="col-md-8 separator-right">
          <div class="row">
            <div class="col-md-12">
              <h2>Project details</h2>
              <h4>Huidige fase: @{{ activeFase.naam }}</h4>
              <div class="spacer"></div>
              <div class="media-controls">
                <div v-if="project.media.length" >
                  <div v-for="medium in project.media">
                    <div id="media-@{{ $index }}" class="media-item">
                      <span v-if="medium.type == 'youtube'" data-type="youtube">
                        <iframe width="100%" height="350px" src="@{{ medium.link }}"></iframe>
                      </span>
                      <span v-if="medium.type == 'image'">
                        <img width="100%" src="@{{ medium.link }}" alt=""  data-type="image"/>
                      </span>
                      <span v-if="medium.type == ''"></span>
                    </div>
                  </div>
                </div>

                <button class="btn" v-on:click="previous" name="button">Vorige</button>
                <button class="btn" v-on:click="next" name="button">Volgende</button>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 project-text">
              <h4>Project beschrijving</h4>
              <p>
                @{{ project.beschrijving }}
              </p>
              <h4>Beschrijving huidige fase</h4>
              <p>
                @{{ activeFase.beschrijving }}
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 inspraakvragen-box separator-top">
              <h2>Inspraakvragen</h2>
              <!-- id="question-@{{ $index }}" -->
              <div v-for="question in questions" class="question">
                <div v-if="currentQuestion == $index">
                  <h4>@{{ question.vraag }}</h4>
                  <ul>
                    <li v-for="answer in question.antwoorden">
                      <a v-on:click="answerQuestion($index)">@{{ answer.antwoord }}</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="tijdlijn">
            <div class="row">
              <div class="page-title tijdlijn-title">
                <h2>Tijdlijn</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 tijdlijn-progress">
                <div v-for="fase in project.fases">
                  <div class="tijdpunt">

                  </div>
                  <div v-if="$index < (project.fases.length - 1)" class="tijdlijnstuk">

                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div v-for="fase in project.fases" class="tijdlijn-fase-ballon">
                  @{{ fase.naam }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/UI/image-browser.js') }}"></script>
  <script src="http://maps.google.com/maps/api/js"></script>
  <script src="{{ asset('js/vendor/gmaps.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/UI/projects-home.js') }}"></script>
@endsection
