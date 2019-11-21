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
            @if ($message['type'] == 'warning')
                <div class="alert alert-warning" role="alert">
                    {{ $message['text'] }}
                </div>
            @endif
        @endif
        @endisset
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div id="editor-container">@isset($note){{$note->text}}@endisset</div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                {!! Form::open(['route' => 'note.store', 'method' => 'post', 'id' => 'form']) !!}
       {!! Form::hidden('text', null, ['class' => 'form-control', 'id' => 'text']) !!}
  <div class="form-group">
   {!! Form::label('password', 'Пароль') !!}
    {!! Form::text('password', null, ['class' => 'form-control']) !!}
    <small id="passwordHelp" class="form-text text-muted">Этим паролем можно защифровать запись, но это не обязательно ;)</small>
  </div>
{!! Form::submit('Пересохранить', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
