<?php $active_link = NULL; ?>
@extends("layouts.master")

@section("content")
    <div>
        <a class="crud-link" href="{{ route("admin.create") }}">+ New Card</a>
    </div>
    @if(isset($error_msg))
        <div>
            <p>{{ $error_msg }}</p>
        </div>
    @endif
    @if(isset($msg))
        <div>
            <p>{{ $msg }}</p>
        </div>
    @endif
    @include("partials.card_pagination")
@endsection