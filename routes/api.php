<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\JournalController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// guest routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// forget password 
Route::post('/send-otp', [ForgotPasswordController::class, 'sendOTPCode']);
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOTP']);
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);
Route::post('/resend-otp', [ForgotPasswordController::class, 'resendOTP']);

Route::middleware('auth:api')->group( function () {
    // user logout
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/logout', [AuthController::class, 'logout']);
    // profile
    Route::post('/update-profile', [ProfileController::class, 'updateProfile']);
    // legal documentation
    Route::get('/get-faq-list', [FaqController::class, 'getFaqList']);
    Route::post('/search-faq', [FaqController::class, 'searchFaq']);
    Route::get('/get-privacy-policy', [FaqController::class, 'getPrivacyPolicy']);

});


// google credential details
// http://127.0.0.1:8000    domain
// http://127.0.0.1:8000/auth/google/callback   // redirect route url

