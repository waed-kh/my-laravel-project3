<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WorkDayController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
Route::get('/', [FrontController::class, 'index'])->name('homePage');
Route::get('contact', [FrontController::class, 'contact_create'])->name('contact');
Route::post('contact', [FrontController::class, 'contact']);

Route::middleware(['guest'])->group(function () {
    Route::get('register', [FrontController::class, 'register'])->name('register');
    Route::post('register', [FrontController::class, 'register_save'])->name('register_save');

    Route::get('login', [FrontController::class, 'login_create'])->name('login');
    Route::post('login', [FrontController::class, 'login']);
});

Route::middleware(['auth'])->group(function (){
    Route::get('projects', [FrontController::class, 'projects'])->name('projects');
    Route::get('project/create', [FrontController::class, 'projectCreate'])->name('project.create');
    Route::post('project', [FrontController::class, 'projectStore'])->name('projectStore');
    Route::get('project/{id}', [FrontController::class, 'project'])->name('project');
    Route::delete('logout', [FrontController::class, 'logout'])->name('logout');


});

Route::prefix('admin')->middleware(['is_admin', 'auth'])->name('admin.')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('location', LocationController::class);
    Route::resource('workday', WorkDayController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('testimonial', TestimonialController::class);

    
 Route::put('project/{id}/approve', [FrontController::class, 'approve'])->name('project.approve');
    Route::put('project/{id}/disapprove', [FrontController::class, 'disapprove'])->name('project.disapprove');
});

Route::middleware(['guest'])->group(function () {
    Route::get('register', [FrontController::class, 'register'])->name('register');
    Route::post('register', [FrontController::class, 'register_save'])->name('register_save');

    Route::get('login', [FrontController::class, 'login_create'])->name('login');
    Route::post('login', [FrontController::class, 'login']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

// require __DIR__ . '/auth.php';


Route::post('/create-checkout-session/{id}', [StripePaymentController::class, 'createStripeSession'])->name('stripe.session');

Route::get('/payment-success/{id}', [StripePaymentController::class, 'success'])->name('payment.success');
Route::get('/payment-cancel/{id}', [StripePaymentController::class, 'cancel'])->name('payment.cancel');

Route::post('/project/download-draft-pdf', [FrontController::class, 'downloadDraftPDF'])->name('project.downloadDraftPDF');
Route::get('/dashboard', [FrontController::class, 'index'])->name('dashboard');
Route::get('/profile', function () {
    return 'صفحة البروفايل تحت الإنشاء';
})->name('profile.edit');


Route::middleware(['auth'])->group(function () {
     Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});








Route::post('/subscribe', [FrontController::class, 'subscribe'])->name('subscribe');