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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/hello',function () use ($router) {
    return "Hello World!";
});

$name = "Nick";
$router->get('/helloNick',function () use ($name) {
    return "Hello $name!";
});

$router->get('/ControllerSample',"Sample@getdata");

$router->get('/ControllerSample/{name}',"Sample@name");

$router->get('/ControllerSample/{a}/{b}',"Sample@add");

$router->get('/alluser', "User@getAlluser");

$router->post('newuser', "User@insertuser");
