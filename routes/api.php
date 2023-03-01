<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource("card", "CardController", [
    "except" => ["edit", "create"]
]);

/*TODO 
Add routes for habitat, food, and continents (possibly nest types and power types)
*/

Route::post("user", [
    "uses" => "AuthController@store"
]);

Route::post("user/signin", [
    "uses" => "AuthController@signIn"
]);
