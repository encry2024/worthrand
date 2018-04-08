<?php

/**
 * All route names are prefixed with 'admin.auth'.
 */
Route::group([
    'namespace'  => 'Currency',
], function () {

    Route::post('currency/convert', 'CurrencyController@convert')->name('currency.convert');

});
