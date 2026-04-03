<?php

use App\Http\Controllers\ProfileController;
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

Route::prefix('trainer')->name('trainer.')->middleware('auth')->group(function () {
    Route::view('/home', 'trainer.home')->name('home');
    Route::view('/messages', 'trainer.messages')->name('messages');
    Route::view('/plansmanage', 'trainer.plansmanage')->name('plansmanage');
    Route::view('/usermanage', 'trainer.usermanage')->name('usermanage');
    Route::view('/settings', 'trainer.settings')->name('settings');
});

require __DIR__.'/auth.php';
