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
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div id="editor-container">@isset($note){{$note->text}}@endisset</div>
            </div>
        </div>
    </div>
</div>
@endsection
