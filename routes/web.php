<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'foo' => 'bar',
    ]);
});

Route::get('/about', function () {
    return Inertia::render('About', [
        'foo' => 'bar',
    ]);
});

Route::get('/contact', function () {
    return Inertia::render('Contact', [
        'foo' => 'bar',
    ]);
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/create', 'UserController@create')->name('create');
    Route::get('/{user}/edit', 'UserController@edit')->name('edit');

    Route::post('/', 'UserController@store')->name('store');
    
    Route::patch('/{user}', 'UserController@update')->name('update');

    Route::delete('/{user}', 'UserController@destroy')->name('destroy');
});
