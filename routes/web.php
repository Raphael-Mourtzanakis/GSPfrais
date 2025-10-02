<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiteurController;

Route::get('/', function () {
    return view('home');
});

Route::get('/connecter', [VisiteurController::class, 'login']);
Route::post('/authentifier', [VisiteurController::class, 'auth']);
Route::get('/deconnecter', [VisiteurController::class, 'logout']);
