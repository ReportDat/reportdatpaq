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

// Route::get('/', function () { return view('welcome'); });

Auth::routes();

// Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\ReportController::class, 'index'])->name('report.index');
Route::get('report/create', [App\Http\Controllers\ReportController::class, 'create'])->name('report.create');
Route::post('report/store', [App\Http\Controllers\ReportController::class, 'store'])->name('report.store');
Route::put('report/{report}', [App\Http\Controllers\ReportController::class, 'update'])->name('report.update');
Route::post('report/import', [App\Http\Controllers\ReportController::class, 'import'])->name('report.import');
