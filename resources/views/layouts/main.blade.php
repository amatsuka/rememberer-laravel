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
    <div id="shade"></div>
<!-- Modal -->
<div class="modal fade tutorialModal" id="tutorialModal" tabindex="-1" role="dialog" aria-labelledby="tutorialModal"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
    <div class="modal-content">
        <!--Body-->
        <div class="modal-body">
          <div class="row d-flex justify-content-center align-items-center">

            <p class="pt-3 pr-2">Предложение пройти туториал
            </p>

            <a type="button" class="btn btn-info waves-effect waves-light tut-set-step"  data-dismiss="modal" data-tut-step='0'>Показать
              <i class="far fa-gem ml-1"></i>
            </a>
            <a type="button" class="btn btn-outline-info waves-effect skip-tut" data-dismiss="modal">Нет, все знаю</a>
          </div>
        </div>
      </div>
  </div>
</div>
<!--step 0 -->
<div class="modal fade tut-modal" id="tut-modal-0" tabindex="-1" role="dialog" aria-labelledby="tut-modal-0"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-sm modal-side modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Про поиск записи
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm tut-set-step" data-dismiss="modal" data-tut-step='1'>Понятно</button>
      </div>
    </div>
  </div>
</div>

<!--step 1 -->
<div class="modal fade tut-modal" id="tut-modal-1" tabindex="-1" role="dialog" aria-labelledby="tut-modal-1"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-sm modal-side modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Про код записи
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm tut-set-step" data-dismiss="modal" data-tut-step='3'>Понятно</button>
      </div>
    </div>
  </div>
</div>

<!--step 3 -->
<div class="modal fade tut-modal" id="tut-modal-3" tabindex="-1" role="dialog" aria-labelledby="tut-modal-3"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-sm modal-side modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Про пароль записи
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm tut-set-step" data-dismiss="modal" data-tut-step='4'>Понятно</button>
      </div>
    </div>
  </div>
</div>

<!--step 4 -->
<div class="modal fade tut-modal" id="tut-modal-4" tabindex="-1" role="dialog" aria-labelledby="tut-modal-4"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-sm modal-side modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Про поле ввода текста
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm tut-set-step" data-dismiss="modal" data-tut-step='5'>Понятно</button>
      </div>
    </div>
  </div>
</div>

<!--step 5 -->
<div class="modal fade tut-modal" id="tut-modal-5" tabindex="-1" role="dialog" aria-labelledby="tut-modal-5"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-sm modal-side modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Про пароль на запись
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm tut-set-step" data-dismiss="modal" data-tut-step='saveNote'>Понятно</button>
      </div>
    </div>
  </div>
</div>
<!--step 6 -->
<div class="modal fade tut-modal" id="tut-modal-6" tabindex="-1" role="dialog" aria-labelledby="tut-modal-6"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-sm modal-side modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Про код и ссылку записи
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm tut-set-step" data-dismiss="modal" data-tut-step='7'>Понятно</button>
      </div>
    </div>
  </div>
</div>
<!--step 7 -->
<div class="modal fade tut-modal" id="tut-modal-7" tabindex="-1" role="dialog" aria-labelledby="tut-modal-7"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-sm modal-side modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Про пересохранение записи
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm tut-set-step" data-dismiss="modal" data-tut-step='8'>Понятно</button>
      </div>
    </div>
  </div>
</div>
<!--step 8 -->
<div class="modal fade tut-modal" id="tut-modal-8" tabindex="-1" role="dialog" aria-labelledby="tut-modal-8"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-sm modal-side modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Про новую заметку
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm tut-set-step" data-dismiss="modal">Понятно</button>
      </div>
    </div>
  </div>
</div>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg static-top navbar-light">
    <div class="container">
      <a class="navbar-brand" href="/">@lang('messages.logo')</a>
     <div class="ml-autod-sm-block d-lg-none d-md-block d-xl-block tut-6-step">
          <a class="btn btn-success" href="/" role="button">@lang('messages.new_note')</a>
                  </div>
                  <div class="ml-auto d-none d-md-none d-lg-block d-xl-none tut-7-step">
          <a class="btn btn-success" href="/" role="button">+</a>
                  </div>
          <div class="ml-3 d-none d-lg-block tut-0-step">
    {!! Form::open(['route' => 'note.view.post', 'class' => 'form-inline md-form my-0', 'method' => 'post', 'autocomplete' => 'off' ]) !!}

    <div class="form-group tut-1-step">
        {!! Form::text('code', $code ?? null, ['class' => 'form-control', 'placeholder' => __('messages.code_phrase_placeholder'), 'autocomplete' => 'off']) !!}
    </div>
        {!! Form::submit(__('messages.find_button'), ['class' => 'btn btn-primary tut-3-step']) !!}
    {!! Form::close() !!}
          </div>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">@lang('messages.menu_about')</a>
          </li>
          <li class="nav-item">
             @if (Session::get('locale') == 'en')
      <a class="lang ru" href="/locale/ru"><img src='/images/ru.svg'></a>
      @else
      <a class="lang en" href="/locale/en"><img src='/images/gb.svg'></a>
      @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container mt-3">
      @isset($message)
      <div class="row pt-3">
    <div class="col">

        @if ($message != null)
            @if ($message['type'] == 'success')
                <div class="alert alert-success" role="alert">
                    {!! $message['text'] !!}
                </div>
            @endif
            @if ($message['type'] == 'need_pass')
                <div class="alert alert-warning" role="alert">
                    {!! $message['text'] !!}
                     {!! Form::open(['route' => 'note.view.post', 'class' => 'md-form my-0 form-inline', 'method' => 'post']) !!}
    <div class="form-group tut-1-step">
               {!! Form::hidden('code', $code ?? null, ['class' => 'form-control', 'id' => 'text']) !!}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('messages.password_placeholder')]) !!}
    </div>
        {!! Form::submit(__("messages.find_button"), ['class' => 'btn btn-primary ml-3 tut-3-step']) !!}
    {!! Form::close() !!}
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
<!-- Footer -->
<footer class="page-footer font-small blue mt-4">

  <!-- Footer Links -->

  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="#">amatsuka</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/highlight.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/quill.js') }}"></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(56473762, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/56473762" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
