@extends('layouts.app')

<!-- Main Content -->
@section('content')
  <div class="container login-box" id="login-box">
      <h1>Reset Password</h1>

      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif

      <form role="form" method="POST" action="{{ url('/password/email') }}">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label>E-Mail Address</label>


          <input type="email" class="form-control" name="email" value="{{ old('email') }}">

          @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>

      <div class="form-group">
        <input type="submit" class="btn btn-primary btn-block" value="Verzend wachtwoord reset link"/>
      </div>
    </form>

  </div>

@endsection
