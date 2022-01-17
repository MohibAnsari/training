<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\GroupController;
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

Auth::routes();

Route::get('/home', 'PostController@index')->name('home');
Route::get('/list',[PostController::class,'index']);

Route::post('store',[PostController::class,'store']);
// Route::get('show',[PostController::class,'show']);
Route::get('delete/{id}',[PostController::class,'destroy']);
Route::get('edit/{id}',[PostController::class,'edit']);
Route::post('update/{id}',[PostController::class,'update']);
//group
Route::get('/group','GroupController@index')->name('group');
Route::get('/group_item_delete/{id}','GroupController@destroy');
Route::get('group_edit/{id}',[GroupController::class,'edit']);
Route::post('group_store',[GroupController::class,'store']);
Route::post('group_update/{id}',[GroupController::class,'update']);


