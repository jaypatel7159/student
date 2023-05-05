<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get("studentList", [StudentController::class, 'studentList'])->name("studentList");

Route::post("studentAdd", [StudentController::class, 'studentAdd'])->name("studentAdd");

Route::get("studentEdit", [StudentController::class, 'studentEdit'])->name("studentEdit");

Route::post("studentUpdate", [StudentController::class, 'studentUpdate'])->name("studentUpdate");

Route::get("studentDelete", [StudentController::class, 'studentDelete'])->name("studentDelete");
