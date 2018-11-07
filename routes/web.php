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
	Route::get('login', 'ProjectController@login');
	Route::post('login', 'ProjectController@loginRequest')->name('login');
	// cai nay la user controller
	Route::get('register', 'ProjectController@register')->name('form.view');
	Route::post('register', 'ProjectController@registerRequest')->name('register');

	Route::middleware(['logined'])->group(function(){
			Route::get('/', 'ProjectController@index');
			// Route::get('book', 'BookController@index')->name('book');
			// Route::get('book/create', 'BookController@create')->name('book.create');
		Route::resource('book','BookController');
		Route::resource('user','UserController');
		Route::middleware(['permission'])->group(function(){
			Route::get('admin', 'ProjectController@admin');

		});
	Route::get('logout', 'ProjectController@logout')->name('logout');
	
	});


	


