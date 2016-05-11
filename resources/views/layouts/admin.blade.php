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
            <li><a href="">Ingelogd als {{ Auth::user()['voornaam'] }} {{ Auth::user()['achternaam'] }} </a></li>
            <li><a href="{{ url('/logout') }}">Afmelden</a></li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <div class="container admin-container">
    <div class="row">
      <div class="admin-title">
        <h1>Administratie: <span class="red">{{ $title }}</span></h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3 admin-menu">
        <nav>
          <ul id="admin-menu">
            <li><a href="{{ url('admin/project/new') }}" class="nieuw-project">Nieuw Project</a></li>
            <li class="admin-menu-title">Huidige Projecten</li>
            <li v-for="project in projects">
              <a href="/project/@{{ project.id }}">@{{ project.naam }}</a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="col-md-9 admin-content">
        @yield('content')
      </div>
    </div>
  </div>

  <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/vendor/vue.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/vendor/vue-resource.min.js')}}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/Admin/admin-menu.js')}}"></script>
  @yield('scripts')
</body>
</html>
