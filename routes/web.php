<?php

use Illuminate\Support\Facades\Route;

Route::delete('admin/plans/{id}', 'App\Http\Controllers\Admin\PlanController@delete')->name('plans.delete');
Route::get('admin/plans/create', 'App\Http\Controllers\Admin\PlanController@create')->name('plans.create');
Route::post('admin/plans', 'App\Http\Controllers\Admin\PlanController@store')->name('plans.store');
Route::get('admin/plans', 'App\Http\Controllers\Admin\PlanController@index')->name('plans.index');

Route::get('admin/plans/{url}', 'App\Http\Controllers\Admin\PlanController@show')->name('plans.show');




Route::get('/', function () {
    return view('welcome');
});
