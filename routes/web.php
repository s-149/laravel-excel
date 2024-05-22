<?php

use Illuminate\Support\Facades\Route;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

// routes/web.php
use App\Imports\UsersImport;
use Illuminate\Http\Request;


use App\Http\Controllers\BarangController;

Route::get('/export-users', function () {
    return Excel::download(new UsersExport, 'users.xlsx');
});
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/users', function () {
    return view('upload');
});


Route::post('/import-users', function (Request $request) {
    Excel::import(new UsersImport, $request->file('file'));

    return redirect('/')->with('success', 'All good!');
});


Route::get('/export-barangs', [BarangController::class, 'export'])->name('export.barangs');
Route::get('/', [BarangController::class, 'showImportForm'])->name('barang');
Route::post('/import-barangs', [BarangController::class, 'import'])->name('import.barangs');
Route::get('/deleteAll', [BarangController::class, 'deleteAll'])->name('deleteAll');

// Route::post('barang/preview', [BarangController::class, 'preview'])->name('barang.preview');
// Route::post('barang/confirm-import', [BarangController::class, 'confirmImport'])->name('barang.confirmImport');
