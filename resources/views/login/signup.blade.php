<?php $active_link = "Login" ?>
@extends("layouts.master")

@section("content")
    <div class="login">
        <h3>Sign Up</h3>
        <form action="{{ route("login.signup") }}" method="post">
            <label for="name">Name:</label>
            <input id="name" name="name" type="text" placeholder="John Smith" />
            <label for="email">Email:</label>
            <input id="email" name="email" type="email" placeholder="jsmith@gmail.com" />
            <label for="password">Password:</label>
            <input id="password" name="password" type="password" placeholder="Password" />
            {{ csrf_field() }}
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection