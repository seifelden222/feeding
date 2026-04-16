<?php

use App\Http\Controllers\Admin\UserManagementController as AdminUserManagementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Trainer\PlanManageController;
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

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::view('/home', 'admin.home')->name('home');
    Route::get('/usermanage', [AdminUserManagementController::class, 'index'])->name('usermanage');
    Route::post('/users', [AdminUserManagementController::class, 'store'])->name('users.store');
    Route::patch('/users/{user}', [AdminUserManagementController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminUserManagementController::class, 'destroy'])->name('users.destroy');
});

Route::prefix('trainer')->name('trainer.')->middleware(['auth', 'role:trainer'])->group(function () {
    Route::view('/home', 'trainer.home')->name('home');
    Route::post('/consultations/{consultation}/join', [\App\Http\Controllers\Trainer\ConsultationController::class, 'join'])->name('consultations.join');
    Route::post('/consultations/{consultation}/approve', [\App\Http\Controllers\Trainer\ConsultationController::class, 'approve'])->name('consultations.approve');
    Route::post('/consultations/seed', [\App\Http\Controllers\Trainer\ConsultationController::class, 'seed'])->name('consultations.seed');
    // Allow GET to the seed URL to avoid MethodNotAllowed when opened directly — redirect back to trainer home
    // Route::get('/consultations/seed', function () {
    //     return redirect()->route('trainer.home');
    // });
    Route::view('/messages', 'trainer.messages')->name('messages');
    Route::get('/plansmanage', [PlanManageController::class, 'index'])->name('plansmanage');
    Route::post('/plansmanage/draft', [PlanManageController::class, 'saveDraft'])->name('plansmanage.draft.save');
    Route::get('/usermanage', [UserManagementController::class, 'index'])->name('usermanage');
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
    Route::patch('/users/{managed_user}', [UserManagementController::class, 'update'])->name('users.update');
    Route::view('/settings', 'trainer.settings')->name('settings');
});

use App\Http\Controllers\User\DailyMealController;

Route::prefix('user')->name('user.')->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/home', [\App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
    Route::get('/messages', fn() => view('user.messages'))->name('messages');
    Route::get('/plans', [\App\Http\Controllers\User\PlansController::class, 'index'])->name('plans');
    Route::post('/plans/{meal}/consume', [\App\Http\Controllers\User\PlansController::class, 'consume'])->name('plans.consume');
    Route::view('/progress', 'user.progress')->name('progress');
    Route::get('/quest', [\App\Http\Controllers\User\QuestController::class, 'index'])->name('quest');
    Route::post('/quest/assign', [\App\Http\Controllers\User\QuestController::class, 'assign'])->name('quest.assign');
    Route::view('/settings', 'user.settings')->name('settings');
    Route::post('/meals', [DailyMealController::class, 'store'])->name('meals.store');
    Route::delete('/meals/{meal}', [DailyMealController::class, 'destroy'])->name('meals.destroy');
    Route::post('/water/add-cup', [\App\Http\Controllers\User\WaterLogController::class, 'addCup'])->name('water.add-cup');
    // add additional nutrition plan for user
    Route::post('/plans/add', [\App\Http\Controllers\UserNutritionPlanController::class, 'store'])->name('plans.add');
});

require __DIR__.'/auth.php';
