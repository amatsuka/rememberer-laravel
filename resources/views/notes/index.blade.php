@extends('layouts.main')

@section('content')
@isset($message)
<div class="row pt-3">
    <div class="col">

        @if ($message != null)
            @if ($message['type'] == 'success')
                <div class="alert alert-success m-0" role="alert">
                    {!! $message['text'] !!}
                </div>
            @endif
            @if ($message['type'] == 'error')
                <div class="alert alert-error m-0" role="alert">
                    {!! $message['text'] !!}
                </div>
            @endif
        @endif
    </div>
</div>
        @endisset
<div class="d-lg-none row mt-3">
      <div class="col">
<div>
    <div class="card">
            <div class="card-body">
    {!! Form::open(['route' => 'note.view.post', 'class' => '', 'method' => 'post']) !!}
    <div class="form-group">
        {!! Form::text('code', $code ?? null, ['class' => 'form-control', 'placeholder' => 'Кодовая фраза ;)']) !!}
    </div>
        <div class="form-group">
            {!! Form::text('password', null, ['class' => 'form-control',  'placeholder' => 'Пароль']) !!}
        </div>
        {!! Form::submit('Найти', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
          </div>
      </div>
      </div>
          </div>
      </div>
<div class="row p-3">
    <div class="col">
        <div class="form-group">
        {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
  </div>
                <div id="editor-container"></div>
                {!! Form::open(['route' => 'note.store', 'method' => 'post', 'id' => 'form']) !!}
  <div class="form-group">
       {!! Form::hidden('text', null, ['class' => 'form-control', 'id' => 'text']) !!}
    <small id="textHelp" class="form-text text-muted">Сюда пости свой текст</small>
  </div>
  <div class="form-group">
   {!! Form::label('password', 'Пароль') !!}
    {!! Form::text('password', null, ['class' => 'form-control']) !!}
    <small id="passwordHelp" class="form-text text-muted">Этим паролем можно защифровать запись, но это не обязательно ;)</small>
  </div>
{!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
    </div>
</div>
@endsection
