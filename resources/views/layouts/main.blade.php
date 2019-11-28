<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Запоминатель 3000</title>
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons"/>
</head>
<body class="bg1">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="/">Логоназвание</a>


     <div class="ml-auto md-1 d-sm-block d-lg-none d-md-block d-xl-block">
          <a class="btn btn-success" href="/" role="button">Создать новую</a>
                  </div>
                  <div class="ml-auto md-1 d-none d-md-none d-lg-block d-xl-none">
          <a class="btn btn-success" href="/" role="button">+</a>
                  </div>
          <div class="ml-3 md-1 d-none d-lg-block">
    {!! Form::open(['route' => 'note.view.post', 'class' => 'form-inline', 'method' => 'post']) !!}
    <div class="form-group">
        {!! Form::text('code', $code ?? null, ['class' => 'form-control', 'placeholder' => 'Кодовая фраза ;)']) !!}
    </div>
        <div class="form-group mx-sm-3">
            {!! Form::text('password', null, ['class' => 'form-control',  'placeholder' => 'Пароль']) !!}
        </div>
        {!! Form::submit('Найти', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
          </div>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">


        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">О проекте</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container bgw">
      @isset($message)
      <div class="row pt-3">
    <div class="col">

        @if ($message != null)
            @if ($message['type'] == 'success')
                <div class="alert alert-success" role="alert">
                    {!! $message['text'] !!}
                </div>
            @endif
            @if ($message['type'] == 'error')
                <div class="alert alert-error" role="alert">
                    {!! $message['text'] !!}
                </div>
            @endif
            @if ($message['type'] == 'warning')
                <div class="alert alert-warning" role="alert">
                    {!! $message['text'] !!}
                </div>
            @endif
        @endif
    </div>
</div>
        @endisset

    @yield('content')
  </div>
</div>
<footer class="footer mt-auto py-3">
  <div class="container">

  </div>
</footer>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/highlight.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/quill.js') }}"></script>
</body>
</html>
