<!DOCTYPE html>
<html>
<head>
  <title>Mixed Website</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="{{ url('/home') }}" class="pull-left logo"><img src="{{ asset('img/logo.jpg') }}" height="71"></a>
        <a class="navbar-brand" href="{{ url('/home') }}">Projectplatform</a>
      </div>

      <div id="navbar" class="navbar-collapse collapse">

        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          <!-- <li></li> -->
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
          <li>
            <a href="{{ url('/login') }}" role="button" aria-haspopup="true" aria-expanded="false">Inloggen</a>
          </li>
          <li><a href="{{ url('/register') }}">Registreren </a></li>
          @else
            <li><a href="{{ url('/home') }}">Projecten </a></li>
            @if (Auth::user()['isAdmin'] == 1)
              <li><a href="{{ url('/admin') }}">Administratie</a></li>
            @endif
          <li><a href="/profiel">Ingelogd als {{ Auth::user()['voornaam'] }} {{ Auth::user()['achternaam'] }} </a></li>
          <li><a href="{{ url('/logout') }}">Afmelden</a></li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

  <footer>
    <div class="footer-title">
      Project: Mixed
    </div>
    <div class="footer-subtext">
      Project Voor antwerpen door mixed
    </div>
  </footer>

  <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/vendor/vue.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/vendor/vue-resource.min.js' )}}"></script>
  @yield('scripts')
</body>
</html>
