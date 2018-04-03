<?php

/**
 * All route names are prefixed with 'admin.auth'.
 */
Route::group([
    'namespace'  => 'IndentedProposal',
], function () {

    Route::get('indented-proposal/deleted', 'IndentedProposalStatusController@getDeleted')->name('indented-proposal.deleted');
    Route::patch('indented-proposal/{indentedProposal}/accept', 'IndentedProposalStatusController@acceptProposal')->name('indented-proposal.accept');
    Route::patch('indented-proposal/{indentedProposal}/send-to-assistant', 'IndentedProposalStatusController@sendToAssistant')->name('indented-proposal.send-to-assistant');
    Route::patch('indented-proposal/{indentedProposal}/accept', 'IndentedProposalStatusController@sendToCollection')->name('indented-proposal.send-to-collection');
    Route::patch('indented-proposal/{indentedProposal}/collect', 'IndentedProposalStatusController@acceptProposal')->name('indented-proposal.collect');

    Route::resource('indented-proposal', 'IndentedProposalController');

    Route::group(['prefix' => 'indented-proposal/{deletedIndentedProposal}'], function () {
        Route::get('delete', 'IndentedProposalStatusController@delete')->name('indented-proposal.delete-permanently');
        Route::get('restore', 'IndentedProposalStatusController@restore')->name('indented-proposal.restore');
    });

});
