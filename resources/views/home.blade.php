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
          <div class="page-title">
            <h2>Project details</h2>
          </div>
          <div class="project-description">
            <div class="row">
              <div class="col-md-10">
                <div class="image-large-holder">
                  <iframe width="100" height="100"
src="@{{ medium.link }}">
</iframe>
                </div>
              </div>
              <div class="col-md-2">
                <ul class="image-list">
                  <li v-for="medium in project.media">
                    <span v-if="medium.type == 'youtube'" data-type="youtube">
                      <iframe width="100" height="100" src="@{{ medium.link }}"></iframe>
                      <img src="" alt="" />
                    </span>
                    <span v-if="medium.type == 'image'">
                      <img src="@{{ medium.link }}" alt=""  data-type="image"/>
                    </span>
                    <span v-if="medium.type == 'video'">
                      <video src="@{{ medium.link }}" data-type="video"></video>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 project-text">
                <p>
                  @{{ project.beschrijving }}
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 separator-top">
                <h4>Huidige fase: Projectfase</h4>

              </div>
            </div>
            <div class="row">
              <div class="col-md-12 inspraakvragen-box separator-top">
                <h2>Inspraakvragen</h2>
                <br />
                <h4>Welke bomen wil je op de groenplaats?</h4>
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
                <div class="tijdpunt tijdpunt-done">

                </div>
                <div class="tijdlijnstuk tijdlijnstuk-done">

                </div>
                <div class="tijdpunt tijdpunt-done">

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
  <script type="text/javascript" src="{{ asset('js/UI/media-items.js') }}"></script>
  <script src="http://maps.google.com/maps/api/js"></script>
  <script src="{{ asset('js/vendor/gmaps.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/UI/maps-config-public.js') }}"></script>
@endsection
