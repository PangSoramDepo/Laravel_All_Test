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

Route::view('welcome','welcome');

Route::get('/customer','DEPO\AllController@passing_data_to_view');
Route::post('/customer','DEPO\AllController@store_validation');

Route::get('/team','DEPO\AllController@scope_testing');
Route::get('/wherehas','DEPO\AllController@wherehas_testing');

//Databases
Route::get('/hasone','DEPO\AllController@hasone');
Route::get('/belongsto','DEPO\AllController@belongsto_testing');
Route::get('/hasmany','DEPO\AllController@hasmany_testing');
Route::get('/belongstomany','DEPO\AllController@belongstomany_testing');