<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','FrontendController@getIndex');



Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'login','middleware'=>'CheckLogedIn'], function () {
        Route::get('/','ControllerLogin@getLogin');
        Route::post('/','ControllerLogin@postLogin');
    });
    Route::get('/logout','ControllerHome@getLogout');

    Route::group(['prefix' => 'admin','middleware'=>'CheckLogedOut'], function () {
        Route::get('/home','ControllerHome@getHome');

        Route::group(['prefix' => 'category'], function () {
            Route::get('/','ControllerCategory@getCate');
            Route::post('/','ControllerCategory@postCate');

            Route::get('edit/{id}','ControllerCategory@getEditCate');
            Route::post('edit/{id}','ControllerCategory@postEditCate');

            Route::get('delete/{id}','ControllerCategory@getDeleteCate');
        });
        Route::group(['prefix' => 'product'], function () {
            Route::get('/','ControllerProduct@getPro');

            Route::get('add','ControllerProduct@getAddPro');
            Route::post('add','ControllerProduct@postAddPro');

            Route::get('edit/{id}','ControllerProduct@getEditPro');
            Route::post('edit/{id}','ControllerProduct@postEditPro');

            Route::get('delete/{id}','ControllerProduct@getDeletePro');
        });
    });
});
