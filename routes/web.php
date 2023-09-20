<?php

use App\Http\Controllers\PembayaranController;
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

Route::middleware('auth')->group(function () {
    Route::controller(PembayaranController::class)->group(function () {
        Route::get('/main-app', 'index');
        Route::post('/pembayaran', 'store');
        Route::delete('/pembayaran/{id}', 'destroy');
    });
});

require __DIR__ . '/auth.php';