<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Jobs\ResetPasswordMail;

class ForgotPasswordController extends Controller
{
    use ApiResponseTrait;
    /**
    * Store a newly created resource in storage.
    * @return JsonResponse
    */
    function sendOTPCode(Request $request):JsonResponse
    {
        try {
            $request->validate([
                'email' => 'required|string|email|max:50|min:7',
            ]);

            $email = $request->input('email');
            $otp   = rand(10000, 99999);
            $user = User::where('email', $email)->first();

            if ($user) {
                ResetPasswordMail::dispatch($user->toArray(), $otp);

                $user->otp = $otp;
                $user->save();

                return $this->successResponse('An OTP has been sent to you email', $otp, 200);

            } else {
                return $this->errorResponse('Invalid Email Address', null, 401);
            }

        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), null, 500);
        }

    }

    /**
    * Store a newly created resource in storage.
    * @return JsonResponse
    */
    public function verifyOTP(Request $request):JsonResponse
    {
        try {
            $request->validate([
                'otp' => 'required|string|max:5|min:5',
            ]);

            $email = $request->input('email');
            $otp   = $request->input('otp');

            $user = User::where('email', $email)->where('otp', $otp)->first();

            if ($user) {
                $user->otp = 0;
                $user->save();

                return $this->successResponse('OTP Verified Successfully', null, 200);

            } else {
                return $this->errorResponse('Invalid OTP Code', null, 401);
            }

        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), null, 500);
        }

    }

    /**
    * Store a newly created resource in storage.
    * @return JsonResponse
    */
    public function resetPassword(Request $request):JsonResponse
    {
        // dd('return');
        try {
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
                'email'    => 'required|string|email|',
            ]);

            $email    = $request->input('email');
            $password = Hash::make($request->input('password'));

            // dd($email);

            $user = User::where('email', $email)->first();

            if ($user) {
                $user->password = $password;
                $user->save();

                // Clear the session
                // Session::forget('password_reset_email');

                return $this->successResponse('Password Reset Successfully', null, 200);

            } else {
                return $this->errorResponse('Invalid Email Address', null, 400);
            }

        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), null, 500);
        }

    }

        /**
     * Resend OTP to the user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function resendOTP(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'email' => 'required|string|email|max:50|min:7',
            ]);

            $email = $request->input('email');
            $user = User::where('email', $email)->first();

            if ($user) {
                // Generate a new OTP
                $otp = rand(10000, 99999);

                // Dispatch the OTP email job
                ResetPasswordMail::dispatch($user->toArray(), $otp);

                // Update the OTP in the database
                $user->otp = $otp;
                $user->save();

                return $this->successResponse('A new OTP has been sent to your email.', $otp, 200);
            } else {
                return $this->errorResponse('Invalid Email Address', null, 401);
            }

        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), null, 500);
        }
    }



}
