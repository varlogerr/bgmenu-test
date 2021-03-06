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

Route::group(['middleware' => 'format-response-content'], function (\Illuminate\Routing\Router $router) {
    $router->get('/users', 'User\ListController');
    $router->post('/users', 'User\CreateController');
    $router->delete('/users/{id}', 'User\DeleteController');
    $router->put('/users/{id}', 'User\UpdateController');
    $router->get('/users/{id}', 'User\ShowController');

    $router->post('/products', 'Product\CreateController');
    $router->get('/products', 'Product\ListController');
    $router->delete('/products/{id}', 'Product\DeleteController');
    $router->get('/products/{id}', 'Product\ShowController');
    $router->put('/products/{id}', 'Product\UpdateController');

    Route::group(['middleware' => 'auth'], function (\Illuminate\Routing\Router $router) {
        $router->post('/orders', 'Order\CreateController');
        $router->get('/orders', 'Order\ListController');
        $router->get('/orders/{hash}', 'Order\ShowController');
        $router->put('/orders/{hash}', 'Order\UpdateController');
    });


    $router->post('/login', 'Authentication\LoginController');
});


//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');
