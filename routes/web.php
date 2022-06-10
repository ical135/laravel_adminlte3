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

// use Illuminate\Routing\Route;


Route::prefix('setting')->group(function() {
    /** User */
    Route::get('/user', 'Setting\UserController@index')->name('User.index');
    Route::get('/user/partial_table_main', 'Setting\UserController@partial_table_main');
    Route::get('/user/table_data', 'Setting\UserController@table_data');
    Route::get('/user/partial_form_main', 'Setting\UserController@partial_form_main');
    Route::post('/user', 'Setting\UserController@store')->name('User.store');
    Route::put('/user', 'Setting\UserController@destroy')->name('User.destroy');
   
});

Route::get('/home', function () {
    return view('tes');
});