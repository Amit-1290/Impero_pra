<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('front.home');
});

Route::post('check/unique/{tableName}/{columnName}/{id?}', 'App\Http\Controllers\Controller@checkUnique')->name('UniqueCheck');

Route::get('/', 'App\Http\Controllers\Front\BusinessController@getBusiness')->name('getBusiness');
Route::get('/business-detail/{business}', 'App\Http\Controllers\Front\BusinessController@getBusinessDetail')->name('getBusinessDetail');
Route::get('/add-business', 'App\Http\Controllers\Front\BusinessController@addBusiness')->name('addBusiness');
Route::post('/store-business', 'App\Http\Controllers\Front\BusinessController@storeBusiness')->name('storeBusiness');
Route::get('/business/{business}/add-branch', 'App\Http\Controllers\Front\BusinessBranchesController@addBranches')->name('addBranches');
Route::post('/business/{business}/store-branch', 'App\Http\Controllers\Front\BusinessBranchesController@storeBusinessBranch')->name('storeBusinessBranch');


