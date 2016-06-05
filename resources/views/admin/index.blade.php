@extends('layouts.admin')

@section('content')
  <div id="admin-index">
    <h3>Welkom</h3>
    @if(isset($message))
      <div class="alert alert-danger">
        {{ $message }}
      </div>
    @endif
    <p>
      Welkom op de project-administratie pagina.
    </p>
      
    <div class="spacer"></div>
         <div class="row nieuwe-vraag-sectie">
            <form action="{{ url('admin/gebruiker/zoeken') }}" method="post">
              {!! csrf_field() !!}

              <div class="form-group{{ $errors->has('gebruiker') ? ' has-error' : '' }}">
                <label>Zoek een gebruiker</label>
                <input type="text" class="form-control" name="gebruiker" placeholder="Typ hier de naam van de gebruiker">
                  @if ($errors->has('gebruiker'))
                      <span class="help-block">
                        <strong>{{ $errors->first('gebruiker') }}</strong>
                      </span>
                    @endif
              </div>

              <input type="submit" name="zoeken" class="btn btn-primary" value="gebruiker zoeken">
                

            </form>
            @if(isset($zoekResultaten))
                    <p>Zoekresultaten:</p>   
                @if(empty($zoekResultaten))
                    <p>Er kon geen gebruiker gevonden worden.</p>    
                @else
                @foreach($zoekResultaten as $zoekResultaat)
                    <div>
                        <div class="col-md-4">
                            {{ $zoekResultaat['voornaam'] }} {{ $zoekResultaat['achternaam'] }}
                            @if($zoekResultaat['isAdmin'] == '1')
                                (Admin)
                            @endif
                        </div>
                        <div a class="link-verwijderen col-md-3">
                            <a href="/admin/gebruiker/delete/{{ $zoekResultaat['id'] }}">Gebruiker verwijderen</a>
                        </div>
                        @if($zoekResultaat['isAdmin'])
                            <div >
                                <a href="/admin/gebruiker/toggleAdminRights/{{ $zoekResultaat['id'] }}">Administrator rechten ontnemen</a>
                            </div>
                        @else
                            <div >
                                <a href="/admin/gebruiker/toggleAdminRights/{{ $zoekResultaat['id'] }}">Administratorrechten geven</a>
                            </div>
                        @endif
                    </div>
                    
                @endforeach
                @endif
            @endif 
             
          
   
  </div>

    

@endsection
        
@section('scripts')
  <script type="text/javascript" src="{{ asset('js/vendor/moment.min.js') }}"></script>
@endsection
