<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectGalleryController;
use App\Http\Controllers\RegisterDeniedController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class, 'index'])->name('home');

//PROJECTS DETAILS
Route::get('/projects/show/{project}', [ProjectController::class, 'show'])->name('project.show');

Route::middleware(['auth'])->group(function () {
    //DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //USERS
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
    Route::put('/users/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    //SKILLS
    Route::get('/skills/{user}', [SkillController::class, 'index'])->name('skill.index');
    Route::post('/skills/store', [SkillController::class, 'store'])->name('skill.store');
    Route::put('/skills/update/{skill}', [SkillController::class, 'update'])->name('skill.update');
    Route::delete('/skills/delete/{skill}', [SkillController::class, 'destroy'])->name('skill.destroy');

    //PROJECTS
    Route::get('/projects/{user}', [ProjectController::class, 'index'])->name('project.index');

    Route::post('/projects/store', [ProjectController::class, 'store'])->name('project.store');
    Route::put('/projects/update/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/projects/delete/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');

    //PROJECT_GALLERIES
    Route::get('/gallery/{project}', [ProjectGalleryController::class, 'index'])->name('gallery.index');
    Route::post('/gallery/store', [ProjectGalleryController::class, 'store'])->name('gallery.store');
    Route::put('gallery/update/{gallery}', [ProjectGalleryController::class, 'update'])->name('gallery.update');
    Route::delete('gallery/delete/{gallery}', [ProjectGalleryController::class, 'destroy'])->name('gallery.destroy');
});



