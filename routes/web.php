<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SchedulesController@home');

//ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('schedules', 'SchedulesController', ['only' => ['store', 'destroy', 'update']]);
    
    //スケージュル
    Route::get('schedules/index', 'SchedulesController@index')->name('schedules.index');
    Route::get('schedules/show/id={id}', 'SchedulesController@show')->name('schedules.show');
    Route::get('schedules/create', 'SchedulesController@create')->name('schedules.create');
    Route::get('schedules/edit/id={id}', 'SchedulesController@edit')->name('schedules.edit');
    Route::put('schedules/status/{id}/{status}', 'SchedulesController@status')->name('schedules.status');
    Route::put('schedules/reminder/{id}/{reminder}', 'SchedulesController@reminder')->name('schedules.reminder');
    
    //顧客
    Route::resource('costomers', 'CostomersController');
    
    //サイト
    Route::resource('sites', 'SitesController');
    Route::get('sites/pv/{id}', 'SitesController@pv_index')->name('sites.pv');
    Route::post('sites/pv_store/{id}', 'SitesController@pv_store')->name('sites.pv_store');
    Route::get('sites/pv_edit/{id}/{site}', 'SitesController@pv_edit')->name('sites.pv_edit');
    Route::put('sites/pv_update/{id}/{site}', 'SitesController@pv_update')->name('sites.pv_update');
    Route::delete('sites/pv_destroy/{id}/{site}', 'SitesController@pv_destroy')->name('sites.pv_destroy');
});
