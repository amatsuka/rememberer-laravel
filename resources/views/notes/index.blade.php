@extends('layouts.main')

@section('content')
<div class="d-lg-none row mt-3">
      <div class="col">
<div>
    {!! Form::open(['route' => 'note.view.post', 'class' => 'md-form my-0', 'method' => 'post']) !!}
    <div class="form-group">
        {!! Form::text('code', $code ?? null, ['class' => 'form-control', 'placeholder' => 'Кодовая фраза ;)']) !!}
    </div>
        <div class="form-group">
            {!! Form::password('password', null, ['class' => 'form-control',  'placeholder' => 'Пароль']) !!}
        </div>
        {!! Form::submit('Найти', ['class' => 'btn btn-primary ml-3']) !!}
    {!! Form::close() !!}
      </div>
          </div>
      </div>
      <hr class="d-lg-none row mt-3"/>
<div class="row pt-3">
    <div class="col">
        {!! Form::open(['route' => 'note.store', 'method' => 'post', 'id' => 'form', 'class' => 'md-form my-0']) !!}
        <div class="form-group">
        {!! Form::submit('Сохранить', ['class' => 'btn btn-primary ml-3']) !!}
  </div>
                <div id="editor-container"></div>

  <div class="form-group">
       {!! Form::hidden('text', null, ['class' => 'form-control', 'id' => 'text']) !!}
    <small id="textHelp" class="form-text text-muted ml-3">Сюда пости свой текст</small>
  </div>
  <div class="form-group">
    {!! Form::password('password', null, ['class' => 'form-control', 'placeholder' => 'Пароль']) !!}
    <small id="passwordHelp" class="form-text text-muted ml-3">Этим паролем можно защифровать запись, но это не обязательно ;)</small>
  </div>
{!! Form::submit('Сохранить', ['class' => 'btn btn-primary ml-3']) !!}

{!! Form::close() !!}
    </div>
</div>
@endsection
