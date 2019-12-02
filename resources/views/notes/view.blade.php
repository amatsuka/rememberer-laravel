@extends('layouts.main')

@section('content')
<div class="row bgw p-3">
    <div class="col">
        @if(isset($note))
                <div id="editor-container">{{$note->text}}</div>
        <div class="card mt-3">
            <div class="card-body">
                {!! Form::open(['route' => 'note.store', 'method' => 'post', 'id' => 'form', 'class' => 'md-form my-0']) !!}
                @csrf
       {!! Form::hidden('text', null, ['class' => 'form-control', 'id' => 'text']) !!}
  <div class="form-group">
   {!! Form::label('password', 'Пароль') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
    <small id="passwordHelp" class="form-text text-muted">Этим паролем можно защифровать запись, но это не обязательно ;)</small>
  </div>
{!! Form::submit('Сохранить как новую', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
    </div>
</div>
@else
@endif
    </div>
</div>
@endsection
