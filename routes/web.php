<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CorrespondenceController;

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

// DATA PEGAWAI
Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');
Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertpegawai', [EmployeeController::class, 'insertpegawai'])->name('insertpegawai');
Route::get('/tampildatapegawai/{id}', [EmployeeController::class, 'tampildatapegawai'])->name('tampildatapegawai');
Route::post('/updatedatapegawai/{id}', [EmployeeController::class, 'updatedatapegawai'])->name('updatedatapegawai');
Route::get('/deletedatapegawai/{id}', [EmployeeController::class, 'deletedatapegawai'])->name('deletedatapegawai');

Route::get('/exportpdf', [EmployeeController::class, 'exportpdf'])->name('exportpdf');
Route::get('/exportexcel', [EmployeeController::class, 'exportexcel'])->name('exportexcel');
Route::post('/importexcel', [EmployeeController::class, 'importexcel'])->name('importexcel');

// Surat Menyurat
Route::get('/surat', [CorrespondenceController::class, 'index'])->name('surat');
Route::get('/tambahsurat', [CorrespondenceController::class, 'tambahsurat'])->name('tambahsurat');
Route::post('/insertsurat', [CorrespondenceController::class, 'insertsurat'])->name('insertsurat');
Route::get('/tampilsurat/{id}', [CorrespondenceController::class, 'tampilsurat'])->name('tampilsurat');
Route::post('/updatesurat/{id}', [CorrespondenceController::class, 'updatesurat'])->name('updatesurat');
Route::get('/deletesurat/{id}', [CorrespondenceController::class, 'deletesurat'])->name('deletesurat');

Route::get('/export1pdf', [CorrespondenceController::class, 'export1pdf'])->name('export1pdf');
Route::get('/export1excel', [CorrespondenceController::class, 'export1excel'])->name('export1excel');
Route::post('/import1excel', [CorrespondenceController::class, 'import1excel'])->name('import1excel');

