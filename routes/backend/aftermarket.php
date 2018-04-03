<?php

/**
 * All route names are prefixed with 'admin.auth'.
 */
Route::group([
    'namespace'  => 'Aftermarket',
], function () {

    Route::get('aftermarket/deleted', 'AftermarketStatusController@getDeleted')->name('aftermarket.deleted');

    Route::resource('aftermarket', 'AftermarketController');

    Route::group(['prefix' => 'aftermarket/{deletedAftermarket}'], function () {
        Route::get('delete', 'AftermarketStatusController@delete')->name('aftermarket.delete-permanently');
        Route::get('restore', 'AftermarketStatusController@restore')->name('aftermarket.restore');
    });

    Route::group([  
        'prefix' => 'aftermarket/{aftermarket}',
        'as'     => 'aftermarket.'
    ], function () {
        Route::resource('pricing_history', 'AftermarketPricingHistoryController');

        Route::group(['prefix' => 'pricing_history/{deletedAftermarketPricingHistory}'], function () {
            Route::get('deleted', 'AftermarketPricingHistoryStatusController@showDeleted')->name('pricing_history.deleted');
            Route::get('delete', 'AftermarketPricingHistoryStatusController@delete')->name('pricing_history.delete-permanently');
            Route::get('restore', 'AftermarketPricingHistoryStatusController@restore')->name('pricing_history.restore');
        });
    });

});
