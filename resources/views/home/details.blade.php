<?php $active_link = NULL; ?> 
@extends("layouts.master")

@section("content")
    <div>
        <a href="{{ route("home.index") }}">&laquo; Back</a>
    </div>
    @include("partials.details")
@endsection