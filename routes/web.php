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

//Route::get('/link', [LinkController::class, 'index'])->name('link.index');;
//Route::get('/link/criar', [LinkController::class, 'create'])->name('link.create');
Route::post('/link/contClick', [LinkController::class, 'contClick'])->name('link.contClick');

Route::resource('/link', LinkController::class)->except(['show','edit','update']);
