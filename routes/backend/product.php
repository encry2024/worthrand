<?php

/**
 * All route names are prefixed with 'admin.auth'.
 */
Route::group([
    'namespace' => 'Product',
    'prefix'    => 'product',
    'as'        => 'product.'
], function () {
    Route::get('/', 'ProductController@index')->name('index');
    Route::post('add-product', 'ProductController@addProduct')->name('add-product');
    
    Route::post('get-product', 'ProductController@get')->name('get-product');
});
