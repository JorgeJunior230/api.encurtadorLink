<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

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
    return redirect('/link');
});

Route::get('/link', [LinkController::class, 'index'])->name('link.index');;
Route::get('/link/create', [LinkController::class, 'create'])->name('link.create');
Route::get('/link/edit', [LinkController::class, 'edit'])->name('link.edit');
Route::get('/link/update/{id}/{click?}', [LinkController::class, 'update'])->name('link.update');

Route::post('/link/updateData', [LinkController::class, 'updateData'])->name('link.updateData');
Route::post('/link/destroy/{id}', [LinkController::class, 'destroy'])->name('link.destroy');
Route::post('/link/store', [LinkController::class, 'store'])->name('link.store');
