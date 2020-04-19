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
Route::post('/updateProduct','AchatController@UpdateProduct');
Route::get('/delete/{id}','PannierController@delete');
Route::get('/deleteProduit/{id}','PannierController@deleteProduit');
Route::get('/deleteUser/{id}','PannierController@deleteUser');
Route::post('/update','Panniercontroller@update')->name('update');
Route::group(['middleware'=>'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

});
Route::post('/addprod','AchatController@addProduct')->name('addprod');
Route::get('/GestionUsers','redirectController@checkUsers')->name('GestionUsers');
Route::get('/Gestion','redirectController@checkProducts')->name('GestionProducts');
Route::get('/AddProduct','redirectController@addProducts')->name('AddProducts');

Route::get('/searchProduit','SearchController@searchProduit');
Route::get('/searchUser','SearchController@searchUser');