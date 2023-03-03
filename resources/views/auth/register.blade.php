<?php $active_link = NULL; ?>
@extends('layouts.master')

@section('content')
    <div>
        <a href="{{ route("login") }}">&laquo; Back</a>
    </div>
    <div>
        <h3>Register</h3>
        <form method="POST" action="{{ route('register') }}">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span>
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span>
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            @if ($errors->has('password'))
                <span>
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>
            {{ csrf_field() }}
            <button type="submit">
                Register
            </button>
        </form>
    </div>
@endsection
