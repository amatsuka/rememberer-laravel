<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons"/>
    @routes
</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
    {!! Form::open(['route' => 'note.view', 'class' => 'form-inline my-2 my-md-0']) !!}
        {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Название']) !!}
        {!! Form::password('password', null, ['class' => 'form-control',  'placeholder' => 'Пароль']) !!}
        {!! Form::submit('Найти', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    @yield('content')
  </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
</body>
</html>
