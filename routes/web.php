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

Route::get('/admin','App\Http\Controllers\Admin\HomeController@index');
// Route::get('/admin','App\Http\Controllers\Admin\HomeController@index');
Route::prefix('/admin')->name('admin.')->namespace('App\Http\Controllers\Admin')->group(function(){
  require 'admin.php';

});
 // Route::group([ 'prefix' => 'admin','namespace'=>'App\Http\Controllers\Admin','name'=>'admin.'], function () {
 //       require 'admin.php';

 //    });

Route::get('/','App\Http\Controllers\Frontend\BusinessAccountController@index');
Route::get('login','App\Http\Controllers\Frontend\LoginController@index');
Route::post('login','App\Http\Controllers\Frontend\LoginController@login')->name('login');
Route::get('signup','App\Http\Controllers\Frontend\LoginController@signup')->name('signup');
Route::get('otp-page','App\Http\Controllers\Frontend\LoginController@otpPage')->name('otp');
Route::get('state/{country}','App\Http\Controllers\Frontend\LoginController@getState');
Route::get('signup-frontend','App\Http\Controllers\Frontend\LoginController@store');

Route::group(['middleware' => 'auth'], function () {
Route::group(['middleware' => ['role:1'], 'prefix' => 'client'], function () {
        require 'client.php';

    });
    Route::group(['middleware' => ['role:2'], 'prefix' => 'partner'], function () {
        require 'partner.php';

    });
});


Route::get('country','App\Http\Controllers\Frontend\BusinessAccountController@country');

Route::post('business-registration-frontend','App\Http\Controllers\Frontend\BusinessAccountController@store');
Route::post('otp-verfication','App\Http\Controllers\Frontend\BusinessAccountController@otp')->name('otp-verfication');
Route::post('business-registration-login','App\Http\Controllers\Frontend\BusinessAccountController@login');

Route::get('add-to-log', 'HomeController@myTestAddToLog');
Route::get('logActivity', 'HomeController@logActivity');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group([
    'namespace' => '\Haruncpi\LaravelLogReader\Controllers',
    'middleware' => ['auth:admin']
    ],
    function () {
        Route::get(config('laravel-log-reader.view_route_path'), 'LogReaderController@getIndex');
        Route::post(config('laravel-log-reader.view_route_path'), 'LogReaderController@postDelete');
        Route::get(config('laravel-log-reader.api_route_path'), 'LogReaderController@getLogs');
    }
);


require 'partner.php';

