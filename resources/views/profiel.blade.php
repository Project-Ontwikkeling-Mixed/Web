@extends('layouts.app')

@section('content')
  <div class="container">
    <div>
      <div class="row project-title">
        <div class="col-md-10">
          <h1>Profielpagina: <span class="red">{{ Auth::user()['voornaam'] }} {{ Auth::user()['achternaam'] }}</span></h1>
        </div>
        <div class="col-md-2">
          <!-- <button class="btn-project horizontal-center"><span class="icon-abonnement"></span> Abonneer</button> -->
        </div>
      </div>
      <div class="row project-holder">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <h2>Uw gegevens</h2>
              <div class="spacer"></div>
            </div>
          </div>
          <div class="row">
            @if(!$noError)
              <div class="alert alert-danger">
                    Uw wachtwoorden komen niet overeen.
              </div>
            @else
              <div class="alert alert-success">
                    Uw gegevens werden succesvol gewijzigd.
              </div>
            @endif
            <form action="/profiel/wijzigen" method="post">

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('voornaam') ? ' has-error' : '' }}">
                    <label for="voornaam">Voornaam</label>
                    <input type="text" class="form-control" value="{{ Auth::user()['voornaam'] }}" name="voornaam" placeholder="Typ hier uw voornaam">
                    @if ($errors->has('voornaam'))
                      <span class="help-block">
                        <strong>{{ $errors->first('voornaam') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('achternaam') ? ' has-error' : '' }}">
                    <label for="achternaam">Achternaam</label>
                    <input type="text" class="form-control" value="{{ Auth::user()['achternaam'] }}" name="achternaam" placeholder="Typ hier uw achternaam">
                    @if ($errors->has('achternaam'))
                      <span class="help-block">
                        <strong>{{ $errors->first('achternaam') }}</strong>
                      </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email-adres</label>
                    <input type="email" class="form-control" value="{{ Auth::user()['email'] }}" name="email" placeholder="Typ hier uw emailadres">
                    @if ($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="nieuwWachtwoord">Nieuw wachtwoord</label>
                    <input type="password" class="form-control" value="" name="nieuwWachtwoord" placeholder="Typ hier uw nieuw wachtwoord">
                    
                </div>
                <div class="form-group">
                    <label for="nieuwWachtwoord">Herhaal nieuw wachtwoord</label>
                    <input type="password" class="form-control" value="" name="herhNieuwWachtwoord" placeholder="Typ hier uw nieuw wachtwoord nogmaals">
                </div>
                
                
              <span>
                <input type="submit" name="wijzigen" class="btn btn-primary" value="Account wijzigen">
              </span>
                <span>
                <a href="/profiel/delete" class="btn btn-red">Account verwijderen</a>
              </span>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection

  <script type="text/javascript" src="{{ asset('js/vendor/vue.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/vendor/vue-resource.min.js')}}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  
  