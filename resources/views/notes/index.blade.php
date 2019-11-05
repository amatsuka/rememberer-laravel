@extends('layouts.main')

@section('content')
saved
@php
    var_dump($note);
@endphp
{!! Form::open(['route' => 'note.store']) !!}

<div class="form-group">
    {!! Form::label('password', 'Password') !!}
    {!! Form::text('password', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}
@endsection
