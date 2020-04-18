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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pannier','Achatcontroller@pannier')->name('pannier');
Route::post('/achat','Achatcontroller@achat')->name('achat');
Route::get('/produit/{id}','Achatcontroller@produit');
Route::post('/authentification','LoginController@authenticate')->name('login.custom');
Route::get('/delete/{id}','PannierController@delete');
Route::post('/update','Panniercontroller@update')->name('update');
Route::group(['middleware'=>'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', function(){
        return view('home');
    })->name('dashboard');

});