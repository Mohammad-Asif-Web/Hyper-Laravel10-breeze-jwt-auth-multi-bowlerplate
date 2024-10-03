<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\AdminController;
use App\Http\Controllers\Web\Backend\BarcodeController;
use App\Http\Controllers\Web\Backend\SettingController;

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

// guest routes will be here
Route::middleware('guest')->group(function () {
    Route::get('/', function(){
        return view('welcome');
    });

});

// Frontend Authenticated Routes will be here
Route::middleware('auth')->group(function () {
    Route::get('/home', function(){
        return view('home');
    });

});

// Backend/Admin Routes will be here
Route::middleware(['auth', 'admin'])->group(function () {
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

});

require __DIR__.'/auth.php';

//      http://127.0.0.1:8000/admin/dashboard/login
