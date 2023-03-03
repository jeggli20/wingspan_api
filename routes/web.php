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

Route::get("about", [
    "uses" => "CardController@getAbout",
    "as" => "home.about"
]);

Route::get("details/{id}", [
    "uses" => "CardController@getDetails",
    "as" => "home.details"
]);

Route::group(["prefix" => "admin"], function() {
    Route::get("", [
        "uses" => "CardController@getAdminIndex",
        "as" => "admin.index"
    ]);

    Route::get("create", [
        "uses" => "CardController@getAdminCreate",
        "as" => "admin.create"
    ]);

    Route::get("update/{id}", [
        "uses" => "CardController@getAdminUpdate",
        "as" => "admin.edit"
    ]);

    Route::get("delete/{id}", [
        "uses" => "CardController@getAdminDelete",
        "as" => "admin.delete"
    ]);

    Route::get("details/{id}", [
        "uses" => "CardController@getAdminDetails",
        "as" => "admin.details"
    ]);

    Route::post("create", [
        "uses" => "CardController@postAdminCreate",
        "as" => "admin.create"
    ]);

    Route::post("update", [
        "uses" => "CardController@postAdminUpdate",
        "as" => "admin.update"
    ]);

    Route::get("delete/confirm/{id}", [
        "uses" => "CardController@getAdminDeleteConfirm",
        "as" => "admin.confirm"
    ]);
});

Auth::routes();
