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

Route::get('/', 'SchedulesController@home')->name('home');
Route::get('home/month', 'SchedulesController@home_month')->name('home.month');
Route::get('home/next', 'SchedulesController@home_next')->name('home.next');

//ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
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
    Route::get('costomers/meeting/{id}', 'CostomersController@meeting')->name('costomers.meeting');

    //サイト
    Route::resource('sites', 'SitesController');

    //PV
    Route::get('sites/pv/{id}', 'SitesController@pv_index')->name('sites.pv');
    Route::post('sites/pv_store/{id}', 'SitesController@pv_store')->name('sites.pv_store');
    Route::get('sites/pv_edit/{id}/{site}', 'SitesController@pv_edit')->name('sites.pv_edit');
    Route::put('sites/pv_update/{id}/{site}', 'SitesController@pv_update')->name('sites.pv_update');
    Route::delete('sites/pv_destroy/{id}/{site}', 'SitesController@pv_destroy')->name('sites.pv_destroy');

    //スポンサー
    Route::get('costomers/sponser/{id}', 'CostomersController@sponser_index')->name('costomers.sponser');
    Route::get('costomers/sponser_create/{id}', 'CostomersController@sponser_create')->name('costomers.sponser_create');
    Route::post('costomers/sponser_store/{id}', 'CostomersController@sponser_store')->name('costomers.sponser_store');
    Route::get('costomers/sponser_show/{id}', 'CostomersController@sponser_show')->name('costomers.sponser_show');
    Route::get('costomers/sponser_edit/{id}/{costomer}', 'CostomersController@sponser_edit')->name('costomers.sponser_edit');
    Route::put('costomers/sponser_update/{id}', 'CostomersController@sponser_update')->name('costomers.sponser_update');
    Route::delete('costomers/sponser_edit/{id}', 'CostomersController@sponser_destroy')->name('costomers.sponser_destroy');

    //入金
    Route::get('costomers/payment/{id}', 'CostomersController@payment_index')->name('costomers.payment');
    Route::post('costomers/payment_store/{id}', 'CostomersController@payment_store')->name('costomers.payment_store');
    Route::delete('costomers/payment_destroy/{id}/{sponser}', 'CostomersController@payment_destroy')->name('costomers.payment_destroy');
    Route::get('costomers/payment_edit/{id}', 'CostomersController@payment_edit')->name('costomers.payment_edit');
    Route::put('costomers/payment_update/{id}', 'CostomersController@payment_update')->name('costomers.payment_update');

    //議事録
    Route::get('proceedings/index/{id}', 'ProceedingController@index')->name('proceedings.index');
    Route::get('proceedings/create/{id}', 'ProceedingController@create')->name('proceedings.create');
    Route::post('proceedings/store', 'ProceedingController@store')->name('proceedings.store');
    Route::get('proceedings/show/{id}', 'ProceedingController@show')->name('proceedings.show');
    Route::get('proceedings/edit/{id}', 'ProceedingController@edit')->name('proceedings.edit');
    Route::put('proceedings/update/{id}', 'ProceedingController@update')->name('proceedings.update');
    Route::delete('prodeedings/destroy/{id}', 'ProceedingController@destroy')->name('proceedings.destroy');

    //売り上げ
    Route::get('sales/index', 'SalesController@index')->name('sales.index');
    Route::post('sales/month', 'SalesController@month')->name('sales.month');
    Route::get('sales/year', 'SalesController@year')->name('sales.year');
    Route::get('sales/edit/{id}', 'SalesController@edit')->name('sales.edit');
    Route::put('sales/update/{id}', 'SalesController@update')->name('sales.update');
    Route::post('sales/store/{id}', 'SalesController@store')->name('sales.store');
    Route::get('sales/production', 'SalesController@production')->name('sales.production');
    Route::get('sales/operating', 'SalesController@operating')->name('sales.operating');
    Route::get('sales/sponser', 'SalesController@sponser')->name('sales.sponser');
    Route::get('sales/addition', 'SalesController@addition')->name('sales.addition');
    Route::get('sales/production_year', 'SalesController@production_year')->name('sales.production_year');
    Route::get('sales/operating_year', 'SalesController@operating_year')->name('sales.operating_year');
    Route::get('sales/sponser_year', 'SalesController@sponser_year')->name('sales.sponser_year');
    Route::get('sales/addition_year', 'SalesController@addition_year')->name('sales.addition_year');
    Route::post('sales/production_month', 'SalesController@production_month')->name('sales.production_month');
    Route::post('sales/operating_month', 'SalesController@operating_month')->name('sales.operating_month');
    Route::post('sales/sponser_month', 'SalesController@sponser_month')->name('sales.sponser_month');
    Route::post('sales/addition_month', 'SalesController@addition_month')->name('sales.addition_month');
    Route::get('sales/addition_index/{id}', 'SalesController@addition_index')->name('sales.addition_index');

    //追加作業費
    Route::post('sales/addition_create/{id}', 'SalesController@addition_create')->name('sales.addition_create');
    Route::get('sales/addition_edit/{id}', 'SalesController@addition_edit')->name('sales.addition_edit');
    Route::put('sales/addition_update/{id}', 'SalesController@addition_update')->name('sales.addition_update');
    Route::delete('sales/addition_destroy/{id}', 'SalesController@addition_destroy')->name('sales.addition_destroy');
});
