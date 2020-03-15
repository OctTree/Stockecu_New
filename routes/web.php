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
Route::get('/home/viewdetail/{id}', 'HomeController@viewdetail');
Route::post('/home/viewdetail/edit', 'HomeController@editTable');
Route::post('/home/viewdetail/delete', 'HomeController@deleteTable');
Route::any('/search','SearchController@index');
Route::get('/locations', 'Locations@index');
Route::post('/locations/add', 'Locations@addLocation');
Route::post('/locations/edit', 'Locations@editLocation');
Route::post('/locations/delete', 'Locations@deleteLocation');


Route::get('/users','UserController@index');
Route::post('/users/add','UserController@addUser');
Route::post('/users/edit', 'UserController@editUser');
Route::post('/users/delete', 'UserController@deleteUser');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
