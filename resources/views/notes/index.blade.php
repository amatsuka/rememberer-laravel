@extends('layouts.main')

@section('content')
<div class="d-lg-none bgw row py-3 mb-3">
      <div class="col">
<div class="tut-0-step">
    {!! Form::open(['route' => 'note.view.post', 'class' => 'md-form my-0', 'method' => 'post']) !!}
    <div class="form-group tut-1-step">
        {!! Form::text('code', $code ?? null, ['class' => 'form-control', 'placeholder' => __('messages.code_phrase_placeholder')]) !!}
    </div>
        <div class="form-group tut-2-step">
            {!! Form::password('password', ['class' => 'form-control',  'placeholder' => __('messages.password_placeholder')]) !!}
        </div>
        {!! Form::submit(__("messages.find_button"), ['class' => 'btn btn-primary ml-3 tut-3-step']) !!}
    {!! Form::close() !!}
      </div>
          </div>
      </div>
<div class="row bgw py-3">
    <div class="col">
        {!! Form::open(['route' => 'note.store', 'method' => 'post', 'id' => 'form', 'class' => 'md-form my-0']) !!}
        <div class="form-group">
        {!! Form::submit(__('messages.save_button'), ['class' => 'btn btn-primary ml-3']) !!}
  </div>
                <div id="editor-container" class=" tut-4-step"></div>

  <div class="form-group">
       {!! Form::hidden('text', null, ['class' => 'form-control', 'id' => 'text']) !!}
    <small id="textHelp" class="form-text text-muted ml-3">@lang('messages.text_label')</small>
  </div>
  <div class="form-group tut-5-step">
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' =>__('messages.password_placeholder')]) !!}
    <small id="passwordHelp" class="form-text text-muted ml-3">@lang('messages.password_label')</small>
  </div>
{!! Form::submit(__('messages.save_button'), ['class' => 'btn btn-primary ml-3']) !!}

{!! Form::close() !!}
    </div>
</div>
@endsection
