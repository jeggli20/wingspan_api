<?php 
$error_msg = isset($error_msg) ? $error_msg : Null; 
$msg = isset($msg) ? $msg : Null; 
?>
@extends("layouts.master")

@section("content")
    <div>
        <a href="{{ route("admin.index") }}">&laquo; Back</a>
    </div>
    @if($error_msg)
        <div class="msg-banner">
            <p>{{ $error_msg }}</p>
        </div>
    @elseif($msg)
        <div class="msg-banner">
            <p>{{ $msg }}</p>
        </div>
    @endif
    @include("partials.details")
@endsection
