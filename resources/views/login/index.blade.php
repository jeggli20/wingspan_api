<?php $active_link = "Login" ?>
@extends("layouts.master")

@section("content")
    <div class="login">
        <h3>Log In</h3>
        <form action="{{ url("api/v1/user") }}" method="POST">
            <label for="name">Name:</label>
            <input id="name" name="name" type="text" placeholder="John Smith" />
            <label for="email">Email:</label>
            <input id="email" name="email" type="email" placeholder="jsmith@gmail.com" />
            <label for="password">Password:</label>
            <input id="password" name="password" type="password" placeholder="Password" />
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>
        <span>Don't have an account?&nbsp;<a class="signup-link" href="">Sign Up</a></span> 
    </div>
@endsection