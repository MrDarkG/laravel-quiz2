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
})->name("index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





//admin panel
	
Route::get("adminpanel","AdminController@index")->name("adminindex");


Route::get("adminpanel/airports/create","AdminController@create")->name("adminairports");
Route::post("adminpanel/airports/store","AdminController@store")->name("adminairportsstore");
Route::get("adminpanel/airports/edit/{id}","AdminController@edit")->name("adminairportsedit")->where(['id' => '[0-9]+']);
Route::post("adminpanel/airports/update","AdminController@update")->name("adminairportsupdate");
Route::post("adminpanel/airports/delete","AdminController@destroy")->name("adminairportsdestroy");



Route::get("adminpanel/flights/create","AdminController@createflights")->name("createflights");
Route::post("adminpanel/flights/store","AdminController@storeflight")->name("storeflight");
Route::get("adminpanel/flights/edit/{id}","AdminController@editflight")->name("editflight")->where(['id' => '[0-9]+']);
Route::post("adminpanel/flights/update","AdminController@updateflight")->name("updateflight");

Route::post("adminpanel/flights/delete","AdminController@destroyflight")->name("delfli");

