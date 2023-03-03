<?php $active_link = "Login" ?>
@extends('layouts.master')

@section('content')
    <div>
        <a href="{{ route("home.index") }}">&laquo; Back</a>
    </div>
    <div>
        <h3>Login</h3>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span>
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
            <button type="submit">Login</button>
            <a href="{{ route('password.request') }}">Forgot Your Password?</a>
            <span>Don't have an account?&nbsp;<a class="signup-link" href="{{ route("register") }}">Sign Up</a></span> 
        </form>
    </div>
@endsection
