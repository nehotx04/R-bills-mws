<?php

use App\Http\Controllers\ClientsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'clients'], function(){
    Route::get('', [ClientsController::class, 'index'])->name('clients.index');
    Route::get('/{client}', [ClientsController::class, 'show'])->name('clients.show');
    Route::put('/{client}', [ClientsController::class, 'update'])->name('clients.update');
    Route::delete('/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');
    Route::post('/new', [ClientsController::class, 'store'])->name('clients.store');

});
