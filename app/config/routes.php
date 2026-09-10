<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/** @var object $router **/

$router->get('/', 'AuthController::login');

$router->get('/login', 'AuthController::login');
$router->post('/login', 'AuthController::login');
$router->get('/register', 'AuthController::register');
$router->post('/register', 'AuthController::register');
$router->post('/logout', 'AuthController::logout');

$router->group(['middleware' => 'auth'], function ($router) {
	$router->get('/products', 'ProductsController::index');
	$router->get('/products/create', 'ProductsController::create');
	$router->post('/products/create', 'ProductsController::store');
	$router->get('/products/edit/{id}', 'ProductsController::edit')->where_number('id');
	$router->post('/products/edit/{id}', 'ProductsController::update')->where_number('id');
    $router->post('/products/delete/{id}', 'ProductsController::delete/$1')->where_number('id');
});