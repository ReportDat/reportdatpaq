<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
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

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/', [ReportController::class, 'index'])->name('report.index');

Route::get('report/create', [ReportController::class, 'create'])->name('report.create');
Route::post('report/store', [ReportController::class, 'store'])->name('report.store');

Route::get('report/{report}/edit', [ReportController::class, 'edit'])->name('report.edit');
Route::patch('report/{report}', [ReportController::class, 'update'])->name('report.update');

Route::post('report/import', [ReportController::class, 'import'])->name('report.import');
Route::get('report/{report}/downloadImage', [ReportController::class, 'downloadImage'])->name('report.downloadImage');