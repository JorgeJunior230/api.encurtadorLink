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
    return redirect('/links');
});

Route::get('/links', [LinkController::class, 'index'])->name('series.index');;
Route::get('/links/criar', [LinkController::class, 'create'])->name('series.create');
Route::post('/links/salvar', [LinkController::class, 'store'])->name('series.store');

//Route::resource('/series', SeriesController::class)->except(['show']);

//Route::get('/series/{series}/seasons',[SeasonsController::class, 'index'])->name('seasons.index');