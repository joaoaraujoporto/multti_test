<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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



$router->get('/api', function () use ($router) {
    return $router->app->version();
});

$router->get('/', function () use ($router) {
    return redirect('/api');
});

$router->get('/api/users/', 'UserController@showAll');
$router->get('/api/users/{id}', 'UserController@show');
$router->post('/api/users/', 'UserController@store');
$router->put('/api/users/{id}', 'UserController@update');
$router->delete('/api/users/{id}', 'UserController@delete');
