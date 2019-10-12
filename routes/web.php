<?php

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
