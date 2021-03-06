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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){

  Route::resource('clientes',     'ClientController');
  Route::post('getClients',       'ClientController@getList');
  Route::post('statusClient',     'ClientController@status');

  Route::resource('autores',      'AuthorController');
  Route::post('getAuthors',       'AuthorController@getList');
  Route::post('statusAuthor',     'AuthorController@status');

  Route::resource('empleados',    'UserController');
  Route::post('getEmpleados',     'UserController@getList');
  Route::post('statusEmpleados',  'UserController@status');

  Route::resource('libros',       'BookController');
  Route::post('getLibros',        'BookController@getList');
  Route::post('statusLibros',     'BookController@status');
  Route::post('getAuthor',        'BookController@getAuthor');


});
