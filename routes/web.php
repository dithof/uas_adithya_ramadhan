<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

Route::get('/', [StudentsController::class, 'index']);
Route::resource('students', StudentsController::class);
