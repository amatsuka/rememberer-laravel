@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col">
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
    </div>
</div>
<div class="row">
    <div class="col">
    {!! Form::open(['route' => 'note.view', 'class' => 'form-inline my-2 my-md-0']) !!}
        {!! Form::text('code', $code, ['class' => 'form-control', 'placeholder' => 'Название']) !!}
        {!! Form::password('password', null, ['class' => 'form-control',  'placeholder' => 'Пароль']) !!}
        {!! Form::submit('Найти', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    </div>
</div>
<div class="row">
    <div class="col">
    <div id="editor-container">{{$note->text}}</div>
    </div>
</div>
@endsection
