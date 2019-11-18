@extends('layouts.main')

@section('content')
<div class="row">
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
    {!! Form::open(['route' => 'note.view.post', 'class' => 'form-inline my-2 my-md-0', 'method' => 'post']) !!}
        {!! Form::text('code', $code ?? null, ['class' => 'form-control', 'placeholder' => 'Название']) !!}
        {!! Form::text('password', null, ['class' => 'form-control',  'placeholder' => 'Пароль']) !!}
        {!! Form::submit('Найти', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    </div>
</div>
<div class="row">
    <div class="col">
    <div id="editor-container">@isset($note){{$note->text}}@endisset</div>
    </div>
</div>
@endsection
