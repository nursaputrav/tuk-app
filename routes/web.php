<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\ProgramKeahlianController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileTukController;
use App\Http\Controllers\GalleryController;

Route::get('/', [ProjectController::class, 'welcome']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/home','home.index')->name('home');
    Route::get('/profile', [ProfileController::class, 'view'])->name('profile.view');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('/project', ProjectController::class);
    Route::get('/project/remove-img/{id}', [ProjectController::class, 'destroyImg'])->name('project.remove');
});

Route::get('/detail/{detail}', [WelcomeController::class, 'welcomeView'])->name('welcome.view');

Route::middleware(['auth','verified','CheckLevel:admin'])->group(function () {
    Route::resource('/sekolah', SekolahController::class);
    Route::resource('/program-keahlian', ProgramKeahlianController::class);
    Route::resource('/skema', SkemaController::class);
    Route::resource('/kelas', KelasController::class);
    Route::resource('/profile-tuk', ProfileTukController::class);
    Route::resource('/gallery', GalleryController::class);
});
