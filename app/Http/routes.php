<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

// Registration
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Login
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Logout
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Pokedex
Route::get('pokedex', 'PokedexController@index');
Route::get('pokedex/{name}', 'PokedexController@show');

Route::get('pokecentre', 'PokecentreController@index');
Route::get('pokecentre/capture', 'PokecentreController@capture');
Route::post('pokecentre/capture', 'PokecentreController@postCapture');
Route::get('pokecentre/captures', 'PokecentreController@getCaptures');

Route::get('pokecentre/captures/{id}/edit', 'PokecentreController@editCapture');
Route::post('pokecentre/captures/{id}', 'PokecentreController@updateCapture');
