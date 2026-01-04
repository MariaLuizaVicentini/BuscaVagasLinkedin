<?php

use App\Http\Controllers\BuscaVagasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/jobs/24h', [BuscaVagasController::class, 'jobs24h']);

Route::get('/jobs/7d', [BuscaVagasController::class, 'jobs7d']);