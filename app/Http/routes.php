<?php



Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('dashboard/results', ['as' => 'dashboard.results', 'uses' => 'ResultsController@index']);
});


Route::group(['prefix' => 'api/v1'], function() {

    Route::resource('results', 'ResultsController');

});
