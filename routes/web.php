<?php

use App\Http\Controllers\Admin\FamilyAdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NameSuggestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //    return view('welcome');
    return \Inertia\Inertia::render('Welcome');
})->name('welcome');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/family/{family:slug}', [NameSuggestionController::class, 'showFamily'])->name('family.show');
Route::post('/family/{family:slug}/suggestions', [NameSuggestionController::class, 'store'])->name('family.suggestions.store');
Route::get('/family/{family:slug}/shuffle', [NameSuggestionController::class, 'shuffle'])->name('family.suggestions.shuffle');
Route::delete('/family/{family:slug}/{id}', [NameSuggestionController::class, 'destroy']);

Route::middleware('adminAuth')->group(function () {
    Route::get('/admin/families', [FamilyAdminController::class, 'index']);
    Route::post('/admin/families', [FamilyAdminController::class, 'store']);
});
