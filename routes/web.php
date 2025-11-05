<?php

use App\Http\Controllers\NameSuggestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [PageController::class, 'index']);

Route::get('/api/suggestions', [NameSuggestionController::class, 'index']);
Route::post('/api/suggestions', [NameSuggestionController::class, 'store']);
Route::get('/api/suggestions/pick', [NameSuggestionController::class, 'pickRandom']);
Route::delete('/api/suggestions/{nameSuggestion}', [NameSuggestionController::class, 'destroy']);
