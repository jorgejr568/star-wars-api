<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return "Hello B2W";
});

$router->group(['prefix' => 'planet','as' => 'planet.'],function () use($router){
    $router->get("/",["uses" => "PlanetController@index","as" => "index"]);
    $router->post("/",["uses" => "PlanetController@store","as" => "store"]);
    $router->get("/{id}",["uses" => "PlanetController@find","as" => "find"]);
    $router->delete("/{id}",["uses" => "PlanetController@delete","as" => "delete"]);
});