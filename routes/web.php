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

});
Route::group(array('namespace'=>'App\Http\Controllers\Client'),function(){
    Route::get('/','ClientController@index');
    Route::get('/ringtone/{id}/{slug}','ClientController@show')->name('ringtone.show');
    Route::post('/ringtone/download/{id}','ClientController@downlaod')->name('ringtone.downlaod');
    Route::get('/category/{id}','ClientController@ringtoneByCategory')->name('ringtone.category');

});