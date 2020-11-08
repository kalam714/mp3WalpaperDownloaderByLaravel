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



Auth::routes([
    'register'=>false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(array('namespace'=>'App\Http\Controllers\Admin','middleware'=>'auth'),function(){
    Route::resource('/ringtones','RingtoneController');
    Route::resource('/images','ImageController');

});
Route::group(array('namespace'=>'App\Http\Controllers\Client'),function(){
    Route::get('/','ClientController@index')->name('index');
    Route::get('/ringtone/{id}/{slug}','ClientController@show')->name('ringtone.show');
    Route::post('/ringtone/download/{id}','ClientController@downlaod')->name('ringtone.downlaod');
    Route::get('/category/{id}','ClientController@ringtoneByCategory')->name('ringtone.category');
    Route::get('/wallpapers','WallpaperController@wallpapers')->name('wallpaper');

    Route::post('/download/{id}','WallpaperController@download')->name('download');
    Route::post('/download1/{id}','WallpaperController@download1')->name('download1');
    Route::post('/download2/{id}','WallpaperController@download2')->name('download2');
    Route::post('/download3/{id}','WallpaperController@download3')->name('download3');

});