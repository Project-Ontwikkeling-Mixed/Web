@extends('layouts.app')

@section('content')
<div class="hero">
  <div class="hero-overlay">
    <div class="hero-content">
      <h1>Ontdek de projecten van onze stad</h1>
      <div class="form-group">
        <a href="{{ url('/home') }}" class="btn-lg btn-primary">Bekijk</a>
      </div>
    </div>
  </div>
</div>
<section class="container-fluid body-white">
  <section class="container">
    <div class="row" style="height: 350px;">
      <div class="col-md-8">
        <h2>Populaire projecten</h2>
      </div>
      <div class="col-md-4">
        <h2>Ontdek de app</h2>
      </div>
    </div>
  </section>
</section>
@endsection
