<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\GarbageBinRequestController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('auth/google',[GoogleController::class,'googlepage']);

route::get('auth/google/callback',[GoogleController::class,'googlecallback']);

route::get('/home',[HomeController::class,'index']);

route::resource('admin',AdminController::class);

//Schedule routes
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('schedule.create');
Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');

//Feedback routes
Route::get('feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store');

//Household routes
Route::get('/household/create', [HouseholdController::class, 'create'])->name('household.create');
Route::post('/household', [HouseholdController::class, 'store'])->name('household.store');

//GarbageBinRequest routes
Route::middleware(['auth'])->group(function () {
    // Garbage Bin Requests routes
    Route::get('/garbage_bin_requests', [GarbageBinRequestController::class, 'index'])->name('garbage_bin_requests.index');
    Route::get('/garbage_bin_requests/create', [GarbageBinRequestController::class, 'create'])->name('garbage_bin_requests.create');
    Route::post('/garbage_bin_requests', [GarbageBinRequestController::class, 'store'])->name('garbage_bin_requests.store');


//Payment routes
Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payment/confirmation', [PaymentController::class, 'confirmation'])->name('payment.confirmation');
});