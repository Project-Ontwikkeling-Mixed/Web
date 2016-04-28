@extends ('layouts.admin')

@section('content')
  <h1>{{ $project->naam }}</h1>
  <p>
    {{ $project->beschrijving }}
  </p>
@endsection
