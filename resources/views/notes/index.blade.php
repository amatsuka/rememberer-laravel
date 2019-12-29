@extends('layouts.main')

@section('content')
<div class="row bgw py-3">
    <div class="col">
        {!! Form::open(['route' => 'note.store', 'method' => 'post', 'id' => 'save-note-form', 'class' => 'md-form my-0']) !!}
        <div class="form-row">
        <div class="form-group col-md-4">
            {!! Form::submit(__('messages.save_button'), ['class' => 'btn btn-primary ml-3', 'autocomplete' => "off"]) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::select('lang',[], null, ['id' => 'editor-lang', 'class' => 'form-control mt-2', 'autocomplete' => "off"]) !!}
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-12">

        <div id="editor-container" class=" tut-4-step"></div>
         {!! Form::hidden('text', null, ['class' => 'form-control', 'id' => 'text']) !!}
       {!! Form::hidden('is_tutorial', null, ['class' => 'form-control', 'id' => 'is-tutorial']) !!}
       {!! Form::hidden('check_code', null, ['class' => 'form-control check-code', 'id' => 'check_code']) !!}
    <small id="textHelp" class="form-text text-muted ml-3">@lang('messages.text_label')</small>
        </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-12 tut-5-step">
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' =>__('messages.password_placeholder')]) !!}
    <small id="passwordHelp" class="form-text text-muted ml-3">@lang('messages.password_label')</small>
  </div>
  </div>
    <div class="form-row">

{!! Form::submit(__('messages.save_button'), ['class' => 'btn btn-primary ml-3']) !!}
  </div>

{!! Form::close() !!}
    </div>
</div>
@endsection
