@extends('layouts.app')

@section('content')
<div class="container login-box" id="login-box">
  <h1>Inloggen</h1>
  <form method="POST" action="{{ url('/login') }}">
    {!! csrf_field() !!}
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">E-mail</label>
        <input type="email" name="email" class="form-control" placeholder="Uw emailadres">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password">Wachtwoord</label>
        <input type="password" name="password" class="form-control" placeholder="Uw passwoord">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>
        </div>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary btn-block" value="Inloggen"/>
      </div>
      <div class="form-group">
        <a href="{{ url('/password/reset') }}">Wachtwoord vergeten?</a>
      </div>
  </form>
</div>
@endsection
