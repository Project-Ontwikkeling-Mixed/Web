@extends('layouts.admin')

@section('content')
  <div class="">
    <h3>Welkom</h3>
    @if(isset($message))
      <div class="alert alert-danger">
        {{ $message }}
      </div>
    @endif
    <p>
      Welkom op de project-administratie pagina.
    </p>
  </div>

@endsection
