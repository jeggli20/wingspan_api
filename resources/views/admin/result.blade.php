<?php $error_msg = isset($error_msg) ? $error_msg : Null; ?>
@extends("layouts.admin")

@section("content")
    <div>
        <a href="{{ route("admin.index") }}">&laquo; Back</a>
    </div>
    @if($error_msg)
        <div class="msg-banner">
            <p>{{ $error_msg }}</p>
        </div>
    @else
        <div class="msg-banner">
            <p>{{ $msg }}</p>
        </div>
        <div class="results">
            <span>Name: {{ $card->name }}</span>
            <span>Scientific Name: {{ $card->scientific_name }}</span>
            <span>Habitat Type: {{ $card->habitat_type }}</span>
            <span>Food Count: {{ $card->food_count }}</span>
            <span>Points: {{ $card->points }}</span>
            <span>Nest Type: {{ $card->nest_type }}</span>
            <span>Egg Count: {{ $card->egg_count }}</span>
            <span>Power Type: {{ $card->power_type }}</span>
            <span>Power: {{ $card->power }}</span>
            <span>Habitat Continent Type: {{ $card->habitat_continent_type }}</span>
        </div>
    @endif
@endsection
