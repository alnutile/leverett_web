<?php


use Illuminate\Support\Facades\Auth;


Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::resource("users","UserController");

    Route::get('dashboard/results', ['as' => 'dashboard.results', 'uses' => 'ResultsController@index']);

    Route::get('/', function() {

        if(Auth::user())
            return redirect()->route('dashboard.results');

        return redirect('login');

    });

});


Route::group(['middleware' => 'auth:api', 'prefix' => 'api/v1'], function() {

    Route::resource('results', 'ResultsController');

});
