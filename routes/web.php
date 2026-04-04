<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Trainer\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// landing page routes
Route::view('/aboutus', 'aboutus')->name('aboutus');
Route::view('/services', 'services')->name('services');
Route::view('/articles', 'articles')->name('articles');
Route::view('/contactus', 'contactus')->name('contactus');
Route::view('/systems', 'systems')->name('systems');
Route::view('/diseases', 'diseases')->name('diseases');

Route::prefix('trainer')->name('trainer.')->middleware(['auth', 'role:trainer'])->group(function () {
    Route::view('/home', 'trainer.home')->name('home');
    Route::view('/messages', 'trainer.messages')->name('messages');
    Route::view('/plansmanage', 'trainer.plansmanage')->name('plansmanage');
    Route::get('/usermanage', [UserManagementController::class, 'index'])->name('usermanage');
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
    Route::patch('/users/{managed_user}', [UserManagementController::class, 'update'])->name('users.update');
    Route::view('/settings', 'trainer.settings')->name('settings');
});

Route::prefix('user')->name('user.')->middleware(['auth', 'role:user'])->group(function () {
    Route::view('/home', 'user.home')->name('home');
    Route::view('/messages', 'user.messages')->name('messages');
    Route::view('/plans', 'user.plans')->name('plans');
    Route::view('/progress', 'user.progress')->name('progress');
    Route::view('/quest', 'user.quest')->name('quest');
    Route::view('/settings', 'user.settings')->name('settings');
});

require __DIR__.'/auth.php';
