<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/url/shorten', [UrlController::class, 'shorten']);
Route::get('/url/{shortened}', [UrlController::class, 'redirect']);
Route::get('/urls', [UrlController::class, 'index']);
Route::get('/topUrls', [UrlController::class, 'topUrls']);