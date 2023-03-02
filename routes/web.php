<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
})->name("home.index");

Route::get("about", function() {
    return view("about.index");
})->name("about.index");

Route::group(["prefix" => "login"], function() {
    Route::get("", function() {
        return view("login.index");
    })->name("login.index");

    Route::post("", [
        "uses" => "AuthController@signin",
        "as" => "login.login"
    ]);

    Route::post("signup", [
        "uses" => "AuthController@store",
        "as" => "login.signup"
    ]);
});

Route::group(["prefix" => "admin"], function() {
    Route::get("", function() {
        return view("admin.index");
    })->name("admin.index");
});
