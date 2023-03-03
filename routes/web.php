<?php

use Illuminate\Support\Facades\Route;


Route::get('admin/plans/create', 'App\Http\Controllers\Admin\PlanController@create')->name('plans.create');
Route::any('admin/plans/search','App\Http\Controllers\Admin\PlanController@search' )->name('plans.search');
Route::delete('admin/plans/{id}', 'App\Http\Controllers\Admin\PlanController@delete')->name('plans.delete');

Route::post('admin/plans', 'App\Http\Controllers\Admin\PlanController@store')->name('plans.store');
Route::get('admin/plans', 'App\Http\Controllers\Admin\PlanController@index')->name('plans.index');

Route::get('admin/plans/{url}', 'App\Http\Controllers\Admin\PlanController@show')->name('plans.show');
Route::put('admin/plans/{url}', 'App\Http\Controllers\Admin\PlanController@update')->name('plans.update');
Route::get('admin/plans/{url}/edit', 'App\Http\Controllers\Admin\PlanController@edit')->name('plans.edit');

Route::get('admin', 'App\Http\Controllers\Admin\PlanController@index')->name('admin.index');




Route::get('/', function () {
    return view('welcome');
});
