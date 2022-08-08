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
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::namespace('App\Http\Controllers\Admin')->middleware(['auth'])->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

Route::namespace('App\Http\Controllers\Admin')->middleware(['auth'])->prefix('dashboard/')->name('admin.')->group(function(){
    Route::get('/setting', 'SettingController@index')->name('setting.index');
    Route::PUT('/setting', 'SettingController@update')->name('setting.update');
    Route::resource('role', 'RoleController')->only('index');
    Route::resource('users', 'UsersController');
});