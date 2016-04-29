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
    <div v-for="proj in project.project">
      <div class="row project-title">
        <div class="col-md-10">
          <h1>@{{ proj.naam }}</h1>
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
                  <img src="" alt="" />
                </div>
              </div>
              <div class="col-md-2">
                <ul class="image-list">
                  <li><img src="{{ asset('img/antwerpen.jpg') }}" alt="" /></li>
                  <li><img src="{{ asset('img/logo.jpg') }}" alt="" /></li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 project-text">
                <p>
                  @{{ proj.beschrijving }}
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
                <div class="tijdlijn-fase-ballon">
                  ontwerpfase
                </div>
                <div class="tijdlijn-fase-ballon-done">
                  designfase
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
  <script type="text/javascript" src="{{ asset('js/vendor/vue.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/vendor/vue-resource.min.js' )}}"></script>
  <script type="text/javascript" src="{{ asset('js/UI/image-browser.js') }}"></script>
  <script src="http://maps.google.com/maps/api/js"></script>
<script src="{{ asset('js/vendor/gmaps.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/UI/maps-config-public.js') }}"></script>
@endsection
