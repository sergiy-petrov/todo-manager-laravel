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

Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@login')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');
Route::get('/register', 'RegistrationController@index')->name('registration.index');
Route::post('/register', 'RegistrationController@register')->name('registration');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/tasks', 'TaskController');
    Route::post('/tasks/{task}/complete', 'TaskCompleteController@store')
        ->middleware('can:complete,task')
        ->name('tasks.complete.store');
});
