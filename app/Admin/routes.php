<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('users', 'UserController');
    $router->resource('user/address', 'AddressController');
    $router->resource('article', 'ArticleController');
    $router->resource('orders', 'OrderController');
    $router->resource('order/parcel', 'OrderParcelController');
    $router->resource('forwarders', 'ForwarderController');
    $router->resource('forwarder/task', 'ForwarderTaskController');
    $router->resource('messages', 'MessageController');
    $router->resource('configs', 'ConfigController');
});
