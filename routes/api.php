<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->name('api.v1.')->group(function () {

    Route::get('test', 'IndexController@test')->name('index.test');

    Route::middleware('throttle:' . config('api.rate_limits.sign'))->group(function () {
        Route::prefix('auth')->group(function () {
            Route::post('login', 'AuthController@login')->name('auth.login');
            Route::post('phone_login', 'AuthController@phoneLogin')->name('auth.phoneLogin');
            Route::post('wx_login', 'AuthController@wxLogin')->name('auth.wxLogin');
            Route::post('register', 'AuthController@register')->name('auth.register');
            Route::post('forget', 'AuthController@forget')->name('auth.forget');
            Route::post('phone_code', 'IndexController@phoneCode')->name('index.phoneCode');
            Route::post('mail_code', 'IndexController@mailCode')->name('index.mailCode');
        });
        Route::prefix('index')->group(function () {
            Route::get('countries', 'IndexController@countries')->name('index.countries');
        });

        Route::middleware('auth:sanctum')->prefix('auth')->group(function () {
            Route::post('bind_phone', 'AuthController@bindPhone')->name('index.bindPhone');
            Route::post('bind_mail', 'AuthController@bindMail')->name('index.bindMail');
            Route::post('loginout', 'AuthController@loginOut')->name('auth.loginOut');
            Route::post('update_userinfo', 'AuthController@updateUserInfo')->name('auth.updateUserInfo');
            Route::post('upload', 'IndexController@upload')->name('index.update');
        });

        Route::middleware('auth:sanctum')->prefix('article')->namespace('Article')->group(function () {
            Route::get('article', 'ArticleController@index')->name('article.index');
            Route::get('article/{id}', 'ArticleController@view')->name('article.view');
        });

        Route::middleware('auth:sanctum')->prefix('forwarder')->namespace('Forwarder')->group(function () {
            Route::get('forwarder', 'ForwarderController@index')->name('forwarder.index');
            Route::get('forwarder/{id}', 'ForwarderController@view')->name('forwarder.view');
            Route::post('forwarder', 'ForwarderController@store')->name('forwarder.store');
            Route::post('forwarder/{id}', 'ForwarderController@update')->name('forwarder.update');

            Route::get('forwarder_task', 'ForwarderTaskController@index')->name('forwarderTask.index');
            Route::get('forwarder_task/{id}', 'ForwarderTaskController@view')->name('forwarderTask.view');
            Route::post('forwarder_task', 'ForwarderTaskController@store')->name('forwarderTask.store');
            Route::post('forwarder_task/{id}', 'ForwarderTaskController@update')->name('forwarderTask.update');
            Route::delete('forwarder_task/{id}', 'ForwarderTaskController@destroy')->name('forwarderTask.destroy');
        });

        Route::middleware('auth:sanctum')->prefix('order')->namespace('Order')->group(function () {
            Route::get('order', 'OrderController@index')->name('order.index');
            Route::get('order/{id}', 'OrderController@view')->name('order.view');
            Route::post('order', 'OrderController@store')->name('order.store');
        });

        Route::middleware('auth:sanctum')->prefix('user')->namespace('User')->group(function () {
            Route::get('address', 'AddressController@index')->name('address.index');
            Route::get('address/{id}', 'AddressController@view')->name('address.view');
            Route::post('address', 'AddressController@store')->name('address.store');
            Route::post('address/{id}', 'AddressController@update')->name('address.update');
            Route::delete('address/{id}', 'AddressController@destroy')->name('address.destroy');
        });

        Route::middleware('auth:sanctum')->prefix('dict')->namespace('Dict')->group(function () {
            Route::get('configs', 'DictController@configs')->name('dict.configs');
            Route::get('countrys', 'DictController@countrys')->name('dict.countrys');
            Route::get('harbours', 'DictController@harbours')->name('dict.harbours');
            Route::get('ships', 'DictController@ships')->name('dict.ships');
            Route::get('airlines', 'DictController@airlines')->name('dict.airlines');
            Route::get('airports', 'DictController@airports')->name('dict.airports');
            Route::get('fba_storage', 'DictController@fba_storage')->name('dict.fba_storage');
        });

    });
});
