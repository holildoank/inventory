<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'HomeController@index');
Route::get('/home', function(){
	return redirect('/');
});

Route::controllers([
	'auth' 			=> 'Auth\AuthController',
]);
Route::group(['middleware' 	=> 'auth'], function () {
	Route::controllers([
		'dashboard'			=> 'DashboardController',
		'masterbarang'		=> 'Transaksi_barang\BarangController',
		'transaksi'			=> 'Transaksi_barang\TransaksiController',

	]);
});
