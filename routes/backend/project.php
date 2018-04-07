<?php

/**
 * All route names are prefixed with 'admin.auth'.
 */
Route::group([
    'namespace'  => 'Project',
], function () {

    Route::get('project/deleted', 'ProjectStatusController@getDeleted')->name('project.deleted');

    Route::resource('project', 'ProjectController');

    Route::group(['prefix' => 'project/{deletedProject}'], function () {
        Route::get('delete', 'ProjectStatusController@delete')->name('project.delete-permanently');
        Route::get('restore', 'ProjectStatusController@restore')->name('project.restore');
    });

    Route::group([  
        'prefix' => 'project/{project}',
        'as'     => 'project.'
    ], function () {
        Route::post('upload', 'ProjectController@uploadFile')->name('upload');

        Route::resource('pricing_history', 'ProjectPricingHistoryController');

        Route::group(['prefix' => 'pricing_history/{deletedProjectPricingHistory}'], function () {
            Route::get('deleted', 'ProjectPricingHistoryStatusController@showDeleted')->name('pricing_history.deleted');
            Route::get('delete', 'ProjectPricingHistoryStatusController@delete')->name('pricing_history.delete-permanently');
            Route::get('restore', 'ProjectPricingHistoryStatusController@restore')->name('pricing_history.restore');
        });
    });

});
