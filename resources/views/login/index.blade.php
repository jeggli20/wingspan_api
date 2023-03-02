<?php $active_link = "Login" ?>
@extends("layouts.master")

@section("content")
    <div class="login">
        <h3>Log In</h3>
        <form action="{{ route("login.index") }}" method="post">
            <label for="email">Email:</label>
            <input id="email" name="email" type="email" placeholder="jsmith@gmail.com" />
            <label for="password">Password:</label>
            <input id="password" name="password" type="password" placeholder="Password" />
            {{ csrf_field() }}
            <button type="submit">Submit</button>
        </form>
        <span>Don't have an account?&nbsp;<a class="signup-link" href="">Sign Up</a></span> 
    </div>
@endsection