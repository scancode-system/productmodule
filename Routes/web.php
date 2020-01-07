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
Route::prefix('products')->middleware('auth')->group(function() {
	Route::get('', 'ProductController@index')->name('products.index');
	Route::get('create', 'ProductController@create')->name('products.create');
	Route::get('{product}/edit', 'ProductController@edit')->name('products.edit');
	Route::get('import', 'ProductController@import')->name('products.import');

	Route::post('', 'ProductController@store')->name('products.store');
	Route::post('{product}/image', 'ProductController@storeImage')->name('products.store.image');

	Route::put('{product}', 'ProductController@update')->name('products.update');
	
	Route::delete('{product}/destroy', 'ProductController@destroy')->name('products.destroy');		
});


Route::prefix('product_categories')->middleware('auth')->group(function() {
	Route::post('', 'ProductCategoryController@store')->name('product_categories.store');
}); 