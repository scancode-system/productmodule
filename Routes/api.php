<?php

Route::prefix('products')->middleware('auth.basic.once')->group(function() {
	
	Route::get('', 'Api\ProductController@index');
	Route::get('{product}', 'Api\ProductController@product');

});
