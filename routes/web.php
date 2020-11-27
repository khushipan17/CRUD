<?php

use Illuminate\Support\Facades\Route;

use App\http\Controllers\TaskController;

//Route::get('/', 'TaskController@index');
Route::get('/', [TaskController::class, 'index']);


Route::post('/task/create' ,[TaskController::class, 'store'])->name('create.task');

Route::delete('/task/delete/{task}' ,[TaskController::class, 'destroy'])->name('delete.task');

Route::get('task/edit/{task}', [TaskController::class, 'edit'])->name('task.edit');

Route::post('task/update/{task}' ,[TaskController::class, 'update'])->name('task.update');



