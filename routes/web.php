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

Route::get('/', [
    "uses" => "CardController@getIndex",
    "as" => "home.index"
]);

Route::get("about", function() {
    return view("about.index");
})->name("about.index");

Route::group(["prefix" => "login"], function() {
    Route::get("", function() {
        return view("login.index");
    })->name("login.index");

    Route::get("signup", function() {
        return view("login.signup");
    })->name("login.signup");

    Route::post("", function() {
        return "It works!";
    })->name("login.index");

    Route::post("signup", function() {
        return "It works!";
    })->name("login.signup");
});

Route::group(["prefix" => "admin"], function() {
    Route::get("", [
        "uses" => "CardController@getAdminIndex",
        "as" => "admin.index"
    ]);

    Route::get("create", function() {
        return view("admin.create");
    })->name("admin.create");

    Route::get("update/{id}", [
        "uses" => "CardController@getAdminUpdate",
        "as" => "admin.edit"
    ]);

    Route::get("delete", function() {
        return view("admin.delete");
    })->name("admin.delete");

    Route::get("result", function() {
        return view("admin.result");
    })->name("admin.result");

    Route::post("create", [
        "uses" => "CardController@postAdminCreate",
        "as" => "admin.create"
    ]);

    Route::post("update", [
        "uses" => "CardController@postAdminUpdate",
        "as" => "admin.update"
    ]);

    Route::post("delete", function() {
        return "It works!";
    })->name("admin.delete");
});
