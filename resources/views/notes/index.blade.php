@extends('layouts.main')

@section('content')
<div class="row mt-3">
    <div class="col">
        @isset($message)
        @if ($message != null)
            @if ($message['type'] == 'success')
                <div class="alert alert-success" role="alert">
                    {{ $message['text'] }}
                </div>
            @endif
            @if ($message['type'] == 'error')
                <div class="alert alert-error" role="alert">
                    {{ $message['text'] }}
                </div>
            @endif
        @endif
        @endisset
        <div class="alert alert-info" role="alert">
            A simple info alert—check it out!
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
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
{!! Form::submit('Запомнить', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
