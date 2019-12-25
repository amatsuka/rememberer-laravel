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
@if (app()->getLocale() == 'ru')
@isset($tutorial1)
@if ($tutorial1)
<div class="modal fade tutorialModal" id="tutorialModal" tabindex="-1" role="dialog" aria-labelledby="tutorialModal"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
    <div class="modal-content">
        <!--Body-->
        <div class="modal-body">
          <div class="row d-flex justify-content-center align-items-center">
              <div class="col "></div>
            <div class="col-sm-12 col-md-8 col-lg-8">
            <p class="pt-3 pr-2">Привет;) Это сервис для сохранения заметок с поддержкой подсветки синтаксиса.  При сохранении кроме ссылки Вы будете получать фразу которую легко запомнить,
                 не нужно никуда сохранять и можно кому-то передать просто сказав в слух. Круто, правда? Хотите узнать как?)
            </p>
</div>
              <div class="col"></div>

          </div>
          <div class="row d-flex justify-content-center align-items-center">
              <a type="button" class="btn btn-info waves-effect waves-light tut-set-step"  data-dismiss="modal" data-tut-step='0'>Показать
              <i class="far fa-gem ml-1"></i>
            </a>
            <a type="button" class="btn btn-outline-info waves-effect skip-tut" href="/skip-tutorial">Нет, я все знаю</a>
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
        <h4 class="modal-title w-100" >Поиск заметки</h4>
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Тут происходит поиск существующей заметки
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
        <h4 class="modal-title w-100" >Поиск заметки</h4>
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        В это поле нужно ввести кодовую фразу записи
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
        <h4 class="modal-title w-100" >Поиск заметки</h4>
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        И нажать найти
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
        <h4 class="modal-title w-100" >Создание заметки</h4>
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Сюда можно ввести текст своей заметки
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm tut-set-step" data-dismiss="modal" data-tut-step='5'>Понятно</button>
      </div>
    </div>
  </div>
</div>

<!--step 5 -->
<div class="modal fade tut-modal top-modal" id="tut-modal-5" tabindex="-1" role="dialog" aria-labelledby="tut-modal-5"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-sm modal-side modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" >Создание заметки</h4>
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Если хотите зашифровать запись то сюда нужно ввести пароль
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm tut-set-step" data-dismiss="modal" data-tut-step='saveNote'>Понятно</button>
      </div>
    </div>
  </div>
</div>
@endif
@endisset

@isset($tutorial2)
@if ($tutorial2)
<!--step 6 -->
<div class="modal fade tut-modal secontStepTutorialModal" data-tut-step="6" id="tut-modal-6" tabindex="-1" role="dialog" aria-labelledby="tut-modal-6"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-sm modal-side modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" >Чтение заметки</h4>
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        После сохранения Вы получите кодовую фразу и ссылку для просмотра заметки. Фразу можно запомнить, передать кому-то
        и по ней найти заметку.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm tut-set-step" data-dismiss="modal" data-tut-step='8'>Понятно</button>
      </div>
    </div>
  </div>
</div>

<!--step 8 -->
<div class="modal fade  top-modal tut-modal" id="tut-modal-8" tabindex="-1" role="dialog" aria-labelledby="tut-modal-8"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-sm modal-side modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" >Создание новой заметки</h4>
          <span aria-hidden="true" data-backdrop="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Нажмите сюда что бы создать свою заметку.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm tut-set-step" data-dismiss="modal">Понятно</button>
      </div>
    </div>
  </div>
</div>
@endif
@endisset
@endif

<!-- Navigation -->
  <nav class="navbar navbar-expand-lg static-top navbar-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
     <div>
          <a class="btn btn-success tut-8-step d-none d-sm-block" href="/" role="button">@lang('messages.new_note')</a>
                  </div>
          <div class="tut-0-step">
    {!! Form::open(['route' => 'note.view.post', 'class' => 'form-inline md-form my-0 header-form', 'method' => 'post', 'autocomplete' => 'off' ]) !!}

    <div class="ml-2 tut-1-step">
        {!! Form::text('code', $code ?? null, ['class' => 'form-control', 'placeholder' => __('messages.code_phrase_placeholder'), 'autocomplete' => 'off']) !!}
    </div>
    <button class="btn btn-primary ml-2 tut-3-step d-md-none small-find-btn" type="submit">
    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="24" height="24"
viewBox="0 0 172 172"
style=" fill:#ffffff;"><g transform="translate(0.516,0.516) scale(0.994,0.994)"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="none" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g fill="#ffffff" stroke="#ffffff" stroke-linejoin="round"><path d="M114.66667,64.5c0,12.52732 -4.67249,23.97256 -12.31771,32.7819l3.05143,3.05143h9.26628l43,43l-14.33333,14.33333l-43,-43v-9.26628l-3.05143,-3.05143c-8.80934,7.64521 -20.25458,12.31771 -32.7819,12.31771c-27.6214,0 -50.16667,-22.54527 -50.16667,-50.16667c0,-27.6214 22.54527,-50.16667 50.16667,-50.16667c27.6214,0 50.16667,22.54527 50.16667,50.16667zM28.66667,64.5c0,19.87509 15.95824,35.83333 35.83333,35.83333c19.87509,0 35.83333,-15.95825 35.83333,-35.83333c0,-19.87509 -15.95825,-35.83333 -35.83333,-35.83333c-19.87509,0 -35.83333,15.95824 -35.83333,35.83333z"></path></g><path d="M0,172v-172h172v172z" fill="none" stroke="none" stroke-linejoin="miter"></path><g fill="#ffffff" stroke="none" stroke-linejoin="miter"><path d="M64.5,14.33333c-27.6214,0 -50.16667,22.54527 -50.16667,50.16667c0,27.6214 22.54527,50.16667 50.16667,50.16667c12.52732,0 23.97256,-4.67249 32.7819,-12.31771l3.05143,3.05143v9.26628l43,43l14.33333,-14.33333l-43,-43h-9.26628l-3.05143,-3.05143c7.64521,-8.80934 12.31771,-20.25458 12.31771,-32.7819c0,-27.6214 -22.54527,-50.16667 -50.16667,-50.16667zM64.5,28.66667c19.87509,0 35.83333,15.95824 35.83333,35.83333c0,19.87509 -15.95825,35.83333 -35.83333,35.83333c-19.87509,0 -35.83333,-15.95825 -35.83333,-35.83333c0,-19.87509 15.95824,-35.83333 35.83333,-35.83333z"></path></g><path d="" fill="none" stroke="none" stroke-linejoin="miter"></path></g></g></svg>
    </button>
        {!! Form::submit(__('messages.find_button'), ['class' => 'btn btn-primary ml-2 tut-3-step d-none d-md-block']) !!}
    {!! Form::close() !!}
          </div>
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
                <div class="alert alert-success tut-6-step" role="alert">
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
            @if ($message['type'] == 'need_pass_directly')
                <div class="alert alert-warning" role="alert">
                    {!! $message['text'] !!}
                     {!! Form::open(['class' => 'md-form my-0 form-inline', 'method' => 'post']) !!}
    <div class="form-group tut-1-step">
               {!! Form::hidden('code', $code ?? null, ['class' => 'form-control', 'id' => 'text']) !!}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('messages.password_placeholder')]) !!}
    </div>
        {!! Form::submit(__("messages.find_button"), ['class' => 'btn btn-primary ml-3 tut-3-step']) !!}
    {!! Form::close() !!}
                </div>
            @endif
            @if ($message['type'] == 'error')
                <div class="alert alert-danger" role="alert">
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
<div class="fab d-sm-none tut-8-step" id="masterfab" onclick="javascript:location.href='/'"><span>+</span></div>
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
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
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
