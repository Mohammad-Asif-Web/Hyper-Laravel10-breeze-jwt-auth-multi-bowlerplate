<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\UserVerifyMail;
use App\Mail\UserVerifyOtpMail;
use App\Models\Post;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Exception;
use App\Traits\ApiResponseTrait;


class AuthController extends Controller
{
    use ApiResponseTrait;
    /**
    * Store a newly created resource in storage.
    * @return JsonResponse
    */
    public function register(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name'            => 'required|string|min:2|max:100',
            'email'           => 'required|string|email|max:100|unique:users',
            'password'        => 'required|string|min:6|confirmed',
            'avatar'          => 'nullable|string',
            'role'            => 'required|in:admin,user',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), null, 422);
        }

        DB::beginTransaction();
        try {

            // Generate a random 5-digit OTP
            $otp = rand(10000, 99999);

            $user = User::create([
                'name'            => $request->input('name'),
                'email'           => $request->input('email'),
                'password'        => Hash::make($request->password),
                'role'            => $request->input('role'),
                'otp'             => $otp,
            ]);

            // handling users email data by UserVerifyMail Jobs
            UserVerifyMail::dispatch($user->toArray(), $otp);

            DB::commit();

            return $this->successResponse('User registerd successfully. An OTP sent to your email for Account verification', $user->toArray(), 200);

        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), null, 500);
        }

    }

    // login with otp verified
    /**
    * Store a newly created resource in storage.
    * @return JsonResponse
    */
    public function login(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email|',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), null, 403);
        }

        // Auth Token By JWT
        $token = auth()->guard('api')->attempt($validator->validated());

        if (!$token) {
            return $this->errorResponse('incorrect credentials, please try again.', null, 403);
        }

        $user = auth()->guard('api')->user();

        // $otp = 0;
        // Check if the user is verified
        if (is_null($user->otp_verified_at)) {
            // Generate a random 5-digit OTP
            $otp = rand(10000, 99999);

            // Update the user with the new OTP
            $user->otp = $otp;
            $user->save();

            // handling users email data by UserVerifyMail Jobs
            UserVerifyMail::dispatch($user, $otp);

            return $this->errorResponse('Please verify your email first. An OTP sent to your email address.', $user, 403);
        }

        if ($user->status == '0') {
            $user->status = '1';
            $user->save();
        }

        return response()->json([
            'status'     => true,
            'message'    => 'User logged in successfully.',
            'token'      => $token,
            'userData'   => auth()->user(),
            'token_type' => 'Bearer',
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60,
            'code'       => '200',
        ], 200);
    }


    /**=================================================
    * =========== Verify User Account OTP ============
    ===================================================*/

     public function verifyUserOTP(Request $request):JsonResponse
     {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|numeric|digits:5',
        ]);

        if($validator->fails()){
            return $this->errorResponse($validator->errors(), null, 422);
        }

        $user = User::where('email', $request->email)->where('otp', $request->otp)->first();

        if(!$user){
            return $this->errorResponse('Invalid OTP or email', null, 401);
        }

        $user->otp_verified_at = now();
        $user->otp = 0;
        $user->save();

        return $this->successResponse('OTP verified successfully. You can now log in.', $user, 200);

     }


    /**
    * Store a newly created resource in storage.
    * @return JsonResponse
    */
    public function logout():JsonResponse
    {
        try {
            // auth()->logout();
            auth()->guard('api')->logout();
            return $this->successResponse('Logout Successfull', null, 200);

        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), null, 500);
        }

    }


}
