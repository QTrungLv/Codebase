<?php

use App\Http\Controllers\PostController;
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
    return view('greeting', ['name' => 'James']);
});

Route::prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'getData']);
    Route::get('/{id}', [PostController::class, 'getDataById']);
    Route::post('/', [PostController::class, 'create']);
    Route::put('/{id}', [PostController::class, 'update']);
    Route::delete('/{id}', [PostController::class, 'delete']);
});