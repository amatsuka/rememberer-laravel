@extends('layouts.main')

@section('content')
<div class="row bgw p-3">
    <div class="col">
        @if(isset($note))
 {!! Form::open(['route' => 'note.store', 'method' => 'post', 'id' => 'save-note-form', 'class' => 'md-form my-0', 'autocomplete' => 'off']) !!}
                @csrf
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
                <div id="editor-container">{{$note->text}}</div>
                 </div>
  </div>
  <div class="form-row">
        <div class="form-group col-md-12">
        <div class="card mt-3">
            <div class="card-body">

       {!! Form::hidden('text', null, ['class' => 'form-control', 'id' => 'text']) !!}
       {!! Form::hidden('parent_code', $note->t_code, ['class' => 'form-control']) !!}
  <div class="form-group">
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('messages.password_placeholder'), 'autocomplete' => 'off']) !!}
    <small id="passwordHelp" class="form-text text-muted">@lang('messages.password_label')</small>
  </div>
{!! Form::submit(__('messages.button_save_as_new'), ['class' => 'btn btn-primary tut-7-step']) !!}
@if ($showDiffButton)
    <a class="btn btn-primary" href={{route('note.view-diff', [$note->t_code])}}>@lang('messages.button_show_diff')</a>
@endif

{!! Form::close() !!}
    </div>
</div>
</div>
</div>
@else
<style>
    footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 54px;
}
</style>
@endif
    </div>
</div>
@endsection
