<?php

Auth::routes();
// View Welcome Page
Route::get('/', 'LandingController')->name('welcome');

Route::group(['prefix' => '/{area}'], function () {
    // Set selected area
    Route::get('/', 'UserAreaController@store')->name('user.area.store');
    // Categories
    Route::resource('/categories', 'CategoryController');
    // Show listings in specific area and category
    Route::get('/categories/{category}/listings', 'ListingController@index')->name('listings.index');
    // Show single listing
    Route::get('/{listing}', 'ListingController@show')->name('listings.show');
    // Store a favourite for listing
    Route::post('/listings/{listing}/favourites', 'ListingFavouritesController@store')->name('listings.favourites.store');
    Route::delete('/listings/{listing}/favourites', 'ListingFavouritesController@destroy')->name('listings.favourites.destroy');
});
