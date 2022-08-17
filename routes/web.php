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
    return view('pages.home');
});

Route::resource('banners','App\Http\Controllers\BannersController');
Route::get('{zip}/{street}','App\Http\Controllers\BannersController@show');
Route::post('{zip}/{street}/photos','App\Http\Controllers\BannersController@addPhotos')->name('addPhoto');
//OR//
//Route::post('{zip}/{street}/photos',['as' => 'store_photo_path','use' => 'App\Http\Controllers\BannersController@addPhotos']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/phpinfo', function() {
    return phpinfo();
});
