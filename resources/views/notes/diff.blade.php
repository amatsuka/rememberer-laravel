@extends('layouts.main')

@section('content')
<div class="row bgw p-3">
    <div class="col">
                <div id="diff-editor-container"></div>
    <div id="first-note">{{$firstNote->text}}</div>
    <div id="second-note">{{$secondNote->text}}</div>
    </div>
</div>
@endsection


