<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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
Route::get('/', function() {
  return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function() {
  Route::resource('tasks', 'TaskController', [
    'only' => [
        'index', 'edit', 'store', 'update', 'destroy'
    ]
  ]);
  Route::get('profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
  Route::patch('profile/{user}', 'ProfileController@update')->name('profile.update');
  Route::patch('tasks/{task}/complete', 'TaskController@complete')->name('tasks.complete');
  Route::patch('tasks/{task}/incomplete', 'TaskController@incomplete')->name('tasks.incomplete');
});
