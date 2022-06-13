<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Api\LinkController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/link',[\App\Http\Controllers\Api\LinkController::class,'index']);
Route::get('/link/{id}',[\App\Http\Controllers\Api\LinkController::class,'show']);
Route::post('/link',[\App\Http\Controllers\Api\LinkController::class,'store']);
Route::delete('/link/{id}',[\App\Http\Controllers\Api\LinkController::class,'destroy']);
Route::put('/link/{id}',[\App\Http\Controllers\Api\LinkController::class,'updateData']);
Route::patch('/link/{id}',[\App\Http\Controllers\Api\LinkController::class,'update']);
Route::get('/link-export',[\App\Http\Controllers\Api\LinkController::class,'exportCsv']);
Route::post('/link-import',[\App\Http\Controllers\Api\LinkController::class,'importSave']);
