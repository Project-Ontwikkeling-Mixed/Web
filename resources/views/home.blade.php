@extends('layouts.app')

@section('content')
<div class="container">
  <div class="page-title"><h2>Projectselectie</h2></div>
  <div class="map-box">
    <div class="row">
      <div class="col-md-3">
        <div class="row">
          <div class="col-md-12">
            <button class="btn btn-lg btn-red border-button"><i class="icon-abonnement"></i> Abonneer</button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 selected-project">
            <div class="selected-project-title">
              <h3>Heraanleg Groenplaats</h3>
            </div>
            <div class="selected-project-content">
              <p>
                We gaan hiermee de groenplaats heraanleggen.
              </p>
              <p>
                Een voorstel voor dit is door alles te vervangen met bomen
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9 map-holder">
        map is hier
      </div>
    </div>
  </div>
  <div class="project-holder">
    <div class="row">
      <div class="col-md-4">
        <div class="page-title">
          <h2>Tijdlijn</h2>
        </div>
        <div class="tijdlijn">
          <div class="tijdlijn-progress">

          </div>
          <div class="tijdlijn-fase-ballon ballon-left">
            ontwerpfase
          </div>
          <div class="tijdlijn-fase-ballon ballon-right">
            designfase
          </div>

        </div>
      </div>
      <div class="col-md-8">
        <div class="page-title">
          <h2>Project details</h2>
          <h4>Huidige fase: Projectfase</h4>
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
                De heraanleg van de groenplaats is een mijlpunt in de geschiedenis van onze wondermooie stad.
                We hebben voor jullie wat ideetjes al gemaakt en zouden graag je inspraak hebben over bepaalde onderwerpbeslissingen.
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h2>Inspraakvragen</h2>
              <br />
              <h4>Welke bomen wil je op de groenplaats?</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vendor/vue.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/UI/image-browser.js') }}"></script>
@endsection
