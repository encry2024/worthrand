<?php

/**
 * All route names are prefixed with 'admin.auth'.
 */
Route::group([
    'namespace'  => 'Seal',
], function () {

    Route::get('seal/deleted', 'SealStatusController@getDeleted')->name('seal.deleted');

    Route::resource('seal', 'SealController');

    Route::group(['prefix' => 'seal/{deletedSeal}'], function () {
        Route::get('delete', 'SealStatusController@delete')->name('seal.delete-permanently');
        Route::get('restore', 'SealStatusController@restore')->name('seal.restore');
    });

    Route::group([  
        'prefix' => 'seal/{seal}',
        'as'     => 'seal.'
    ], function () {
        Route::post('upload', 'SealController@uploadFile')->name('upload');
        Route::get('{file}/download', 'SealController@downloadFile')->name('download');

        Route::resource('pricing_history', 'SealPricingHistoryController');

        Route::group(['prefix' => 'pricing_history/{deletedSealPricingHistory}'], function () {
            Route::get('deleted', 'SealPricingHistoryStatusController@showDeleted')->name('pricing_history.deleted');
            Route::get('delete', 'SealPricingHistoryStatusController@delete')->name('pricing_history.delete-permanently');
            Route::get('restore', 'SealPricingHistoryStatusController@restore')->name('pricing_history.restore');
        });
    });

});
