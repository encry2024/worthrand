<?php

/**
 * All route names are prefixed with 'admin.auth'.
 */
Route::group([
    'namespace'  => 'BuyAndResaleProposal',
], function () {

    Route::get('buy-and-resale-proposal/deleted', 'BuyAndResaleProposalStatusController@getDeleted')->name('buy-and-resale.deleted');

    Route::resource('buy-and-resale-proposal', 'BuyAndResaleProposalController');

    Route::group(['prefix' => 'buy-and-resale/{deletedBuyAndResaleProposal}'], function () {
        Route::get('delete', 'BuyAndResaleProposalStatusController@delete')->name('buy-and-resale.delete-permanently');
        Route::get('restore', 'BuyAndResaleProposalStatusController@restore')->name('buy-and-resale.restore');
    });

});
