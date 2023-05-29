<?php

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'api', 'prefix' => 'jwt'], function(){
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout')->name('logout');
    Route::group(['middleware' => 'auth:api','prefix'=>'page'],function (){
        Route::get('welcome', 'UserController@welcome')->name('welcome');
        Route::group(['prefix'=>'event'],function (){
            Route::post('create_event_category', 'EventCategoryController@createEventCategory')->name('create_event_category');
            Route::get('list_category', 'EventCategoryController@listCategory')->name('list_category');

        });
        Route::group(['prefix'=>'message'],function (){
            Route::post('create_message', 'MessageController@createMessage')->name('create_message');
            Route::get('list_message', 'MessageController@listMessage')->name('list_messae');

        });
        Route::group(['prefix'=>'event'],function (){
            Route::post('create_event', 'EventController@createEvent')->name('create_event');
            Route::get('list_event', 'EventController@listEvent')->name('list_event');

        });
        Route::group(['prefix'=>'receiver'],function (){
            Route::post('create_receiver', 'ReceiverController@createReceiver')->name('create_receiver');
            Route::get('list_receiver', 'ReceiverController@listReceiver')->name('list_receiver');

        });

    });
});