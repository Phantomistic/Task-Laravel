<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('/tasks/{id}/edit', [TaskController::class, 'update'])->name('tasks.update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/tasks/{id}/edit', 'TaskController@edit')->name('tasks.edit');

Route::resource('tasks', 'App\Http\Controllers\TaskController')->only(['index','store','edit','destroy','update']);

Route::put('tasks/{id}', 'App\Http\Controllers\TaskController@update');