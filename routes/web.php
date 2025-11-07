<?php

use App\Http\Controllers\NameSuggestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\FamilyAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/family/{family:slug}', [PageController::class, 'showFamily'])->name('family.show');
Route::post('/family/{family:slug}/suggestions', [NameSuggestionController::class, 'store'])->name('family.suggestions.store');
Route::get('/family/{family:slug}/shuffle', [NameSuggestionController::class, 'shuffle'])->name('family.suggestions.shuffle');
Route::delete('/family/{family:slug}/{id}', [NameSuggestionController::class, 'destroy']);


Route::middleware('adminAuth')->group(function () {
    Route::get('/admin/families', [FamilyAdminController::class, 'index']);
    Route::post('/admin/families', [FamilyAdminController::class, 'store']);
});
