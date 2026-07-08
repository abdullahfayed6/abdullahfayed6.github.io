<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/projects/{id}', [PublicController::class, 'portfolioDetails'])->name('portfolio.details');
Route::get('/service-details', function () {
    return view('service-details');
})->name('service.details');
Route::get('/starter-page', function () {
    return view('starter-page');
})->name('starter.page');
Route::post('/contact', [PublicController::class, 'submitContact'])->name('contact.submit');

// Admin Authentication Routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Dashboard Routes (Protected)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Projects CRUD
    Route::get('/projects', [AdminController::class, 'projectsIndex'])->name('projects.index');
    Route::get('/projects/create', [AdminController::class, 'projectsCreate'])->name('projects.create');
    Route::post('/projects', [AdminController::class, 'projectsStore'])->name('projects.store');
    Route::get('/projects/{project}/edit', [AdminController::class, 'projectsEdit'])->name('projects.edit');
    Route::put('/projects/{project}', [AdminController::class, 'projectsUpdate'])->name('projects.update');
    Route::delete('/projects/{project}', [AdminController::class, 'projectsDestroy'])->name('projects.destroy');

    // Skills CRUD
    Route::get('/skills', [AdminController::class, 'skillsIndex'])->name('skills.index');
    Route::post('/skills', [AdminController::class, 'skillsStore'])->name('skills.store');
    Route::delete('/skills/{skill}', [AdminController::class, 'skillsDestroy'])->name('skills.destroy');

    // Resume Items CRUD
    Route::get('/resume', [AdminController::class, 'resumeIndex'])->name('resume.index');
    Route::get('/resume/create', [AdminController::class, 'resumeCreate'])->name('resume.create');
    Route::post('/resume', [AdminController::class, 'resumeStore'])->name('resume.store');
    Route::get('/resume/{item}/edit', [AdminController::class, 'resumeEdit'])->name('resume.edit');
    Route::put('/resume/{item}', [AdminController::class, 'resumeUpdate'])->name('resume.update');
    Route::delete('/resume/{item}', [AdminController::class, 'resumeDestroy'])->name('resume.destroy');

    // Achievements CRUD
    Route::get('/achievements', [AdminController::class, 'achievementsIndex'])->name('achievements.index');
    Route::get('/achievements/create', [AdminController::class, 'achievementsCreate'])->name('achievements.create');
    Route::post('/achievements', [AdminController::class, 'achievementsStore'])->name('achievements.store');
    Route::get('/achievements/{achievement}/edit', [AdminController::class, 'achievementsEdit'])->name('achievements.edit');
    Route::put('/achievements/{achievement}', [AdminController::class, 'achievementsUpdate'])->name('achievements.update');
    Route::delete('/achievements/{achievement}', [AdminController::class, 'achievementsDestroy'])->name('achievements.destroy');

    // Settings
    Route::get('/settings', [AdminController::class, 'settingsEdit'])->name('settings.edit');
    Route::post('/settings', [AdminController::class, 'settingsUpdate'])->name('settings.update');

    // Messages
    Route::get('/messages', [AdminController::class, 'messagesIndex'])->name('messages.index');
    Route::delete('/messages/{message}', [AdminController::class, 'messagesDestroy'])->name('messages.destroy');
});
