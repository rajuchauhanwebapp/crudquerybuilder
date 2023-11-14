<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::get('/',[StudentController::class, 'index'])->name('index');
Route::post('/add',[StudentController::class, 'store'])->name('add');
Route::post('/update',[StudentController::class, 'edit'])->name('edit');
Route::put('/update',[StudentController::class, 'update'])->name('update');
Route::post('/delete',[StudentController::class, 'destroy'])->name('delete');
