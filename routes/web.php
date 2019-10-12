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
// View Welcome Page
Route::get('/', 'LandingController')->name('welcome');

Route::group(['prefix' => '/{area}'], function () {
    // Set selected area
    Route::get('/', 'UserAreaController@store')->name('user.area.store');
    Route::resource('/categories', 'CategoryController');
    Route::get('/categories/{category}/listings', 'ListingController@index')->name('listings.index');
    Route::get('/{listing}', 'ListingController@show')->name('listings.show');
});
