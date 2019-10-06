<?php

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

Auth::routes();
Route::get('/', 'LandingController')->name('welcome');
Route::get('/{area}', 'AreaController@store')->name('areas.store');

Route::group(['prefix' => '/{area}'], function () {
    Route::resource('/categories', 'CategoryController');
});
