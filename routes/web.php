<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {

    /**
     * Routes Plan details
     */
    Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');

    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');
    Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');




    /**
     * Routes Plans
     */
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::delete('plans/{id}', 'PlanController@delete')->name('plans.delete');

    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::get('plans', 'PlanController@index')->name('plans.index');

    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');

    /**
     * Route Home dashboard
     */
    Route::get('/', 'PlanController@index')->name('admin.index');
});


Route::get('/', function () {
    return view('welcome');
});
