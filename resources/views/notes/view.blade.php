@extends('layouts.main')

@section('content')
<div class="row bgw p-3">
    <div class="col">
        @if(isset($note))
                <div id="editor-container">{{$note->text}}</div>
        <div class="card mt-3">
            <div class="card-body">
                {!! Form::open(['route' => 'note.store', 'method' => 'post', 'id' => 'save-note-form', 'class' => 'md-form my-0']) !!}
                @csrf
       {!! Form::hidden('text', null, ['class' => 'form-control', 'id' => 'text']) !!}
  <div class="form-group">
   {!! Form::label('password', __('messages.password_placeholder')) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
    <small id="passwordHelp" class="form-text text-muted">@lang('messages.password_label')</small>
  </div>
{!! Form::submit(__('messages.button_save_as_new'), ['class' => 'btn btn-primary tut-6-step']) !!}

{!! Form::close() !!}
    </div>
</div>
@else
@endif
    </div>
</div>
@endsection
