<?php

use App\Http\Controllers\Admin\AdminAuthController;
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

// Admin auth routes
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('adminLogin')->group(function () {
    Route::get('/admin/families', [FamilyAdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware('adminAuth')->group(function () {
    Route::post('/admin/families', [FamilyAdminController::class, 'store'])->name('admin.family.store');
});
