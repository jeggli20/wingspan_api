<?php $active_link = NULL; ?>
@extends("layouts.admin")

@section("content")
    <div>
        <a class="crud-link" href="{{ route("admin.create") }}">+ New Card</a>
        <a class="crud-link" href="{{ route("admin.delete") }}">- Delete Card</a>
    </div>
    @include("partials.card_pagination")
@endsection