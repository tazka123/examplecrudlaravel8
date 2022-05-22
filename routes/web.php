<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');
Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertpegawai', [EmployeeController::class, 'insertpegawai'])->name('insertpegawai');
Route::get('/tampildatapegawai/{id}', [EmployeeController::class, 'tampildatapegawai'])->name('tampildatapegawai');
Route::post('/updatedatapegawai/{id}', [EmployeeController::class, 'updatedatapegawai'])->name('updatedatapegawai');
Route::get('/deletedatapegawai/{id}', [EmployeeController::class, 'deletedatapegawai'])->name('deletedatapegawai');

Route::get('/exportpdf', [EmployeeController::class, 'exportpdf'])->name('exportpdf');
Route::get('/exportexcel', [EmployeeController::class, 'exportexcel'])->name('exportexcel');
Route::post('/importexcel', [EmployeeController::class, 'importexcel'])->name('importexcel');
