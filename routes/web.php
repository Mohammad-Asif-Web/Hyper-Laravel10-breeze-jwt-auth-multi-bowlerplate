<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\Web\Backend\FaqController;
use App\Http\Controllers\Web\Backend\UserController;
use App\Http\Controllers\Web\Backend\AdminController;
use App\Http\Controllers\Web\Backend\CourseController;
use App\Http\Controllers\Web\Backend\BarcodeController;
use App\Http\Controllers\Web\Backend\SettingController;
use App\Http\Controllers\Web\Backend\CourseLessonController;
use App\Http\Controllers\Web\Backend\CourseCategoryController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

*/
// this route to check 404, 500 error pages
// Route::get('/abort', function () {
//     abort(500);
// });
// Run Artisan Commands by URL Hitting
Route::get('/run-migrate', function () {
    Artisan::call('migrate');
    return 'Database migration completed successfully!';
});

Route::get('/run-migrate-fresh', function () {
    Artisan::call('migrate:fresh --seed');
    return 'Database migration and seeding completed successfully!';
});

Route::get('/run-optimize-clear', function () {
    Artisan::call('optimize:clear');
    return 'Application cache cleared and optimized!';
});

// guest routes will be here
Route::middleware('guest')->group(function () {
    Route::get('/', function(){
        return redirect()->route('admin.login');
    });

});
// Frontend Authenticated Routes will be here
Route::middleware('auth')->group(function () {
    Route::get('/home', function(){
        return view('home');
    });
});

// Backend/Admin Routes will be here
Route::middleware(['admin'])->group(function () {
    // Admin Profile routes
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::post('/admin/profile/update-email', [AdminController::class, 'updateEmail'])->name('admin.profile.update.email');
    Route::post('/admin/profile/update-password', [AdminController::class, 'updatePassword'])->name('admin.profile.update.password');
    Route::post('/admin/profile/update-social', [AdminController::class, 'updateSocial'])->name('admin.profile.update.social');
    // general setting
    Route::get('/admin/setting', [SettingController::class, 'index'])->name('admin.setting');
    Route::post('/admin/setting/update', [SettingController::class, 'update'])->name('admin.setting.update');

    // User routes
    Route::get('/admin/user/index', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user/{id}/show', [UserController::class, 'show'])->name('admin.user.show');
    Route::post('/admin/user/toggle-status/{id}', [UserController::class, 'toggleStatus'])->name('admin.user.toggle-status');
    Route::delete('/admin/user/bulk-delete', [UserController::class, 'bulkDelete'])->name('admin.user.bulk-delete');
    Route::get('/admin/user/index/search', [UserController::class, 'search'])->name('admin.user.search');

    // FAQ Routes
    Route::get('/admin/faq/list', [FaqController::class, 'index'])->name('admin.faq.index');
    Route::get('/admin/faq/create', [FaqController::class, 'create'])->name('admin.faq.create');
    Route::post('/admin/faq/store', [FaqController::class, 'store'])->name('admin.faq.store');
    Route::get('/admin/faq/edit/{id}', [FaqController::class, 'edit'])->name('admin.faq.edit');
    Route::post('/admin/faq/update/{id}', [FaqController::class, 'update'])->name('admin.faq.update');

    Route::get('/admin/faq/list/search', [FaqController::class, 'search'])->name('admin.faq.search');
    Route::post('/admin/faq/toggle-status/{id}', [FaqController::class, 'toggleStatus'])->name('admin.faq.toggle-status');
    Route::delete('/admin/faq/bulk-delete', [FaqController::class, 'BulkDelete'])->name('admin.faq.bulk-delete');

    // Privacy & Policy
    Route::get('/admin/privacy/policy/edit', [PolicyController::class, 'edit'])->name('admin.policy.edit');
    Route::put('/admin/privacy/policy/update', [PolicyController::class, 'update'])->name('admin.policy.update');

});

require __DIR__.'/auth.php';

//      http://127.0.0.1:8000/login
