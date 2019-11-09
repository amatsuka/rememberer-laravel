@extends('layouts.main')

@section('content')
@php
    var_dump($note);
@endphp

<div class="row">
    <div class="col">
        <div class="alert alert-warning" role="alert">
            Content
        </div>
        <div class="alert alert-success" role="alert">
            Content
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
{!! Form::open(['route' => 'note.store']) !!}
  <div class="form-group">
   {!! Form::label('text', 'Заметка') !!}
       {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
    <small id="textHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
   {!! Form::label('password', 'Пароль') !!}
    {!! Form::text('password', null, ['class' => 'form-control']) !!}
    <small id="passwordHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
{!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
    </div>
</div>
@endsection
