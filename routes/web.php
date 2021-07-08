<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ClientController;


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

Route::get('/client', function () {
    return view('client');
});


Auth::routes();



Route::get('client',[App\Http\Controllers\ClientController::class,'getClient'])->name('getClient');

Route::get('/home', [App\Http\Controllers\ContactController::class, 'index'])->name('home');
Route::delete('/destroy/{id}',[ContactController::class,'destroy'])->name('destroy');
Route::put('/update',[App\Http\Controllers\ContactController::class,'update'])->name('update');


Route::post('/home', [
    'as'    =>    'contact.store',
    'uses'     =>    'ContactController@store'
]);





