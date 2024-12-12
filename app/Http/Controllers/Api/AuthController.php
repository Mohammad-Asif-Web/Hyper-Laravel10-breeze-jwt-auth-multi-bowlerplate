<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'email'           => 'required|string|email|max:50|unique:users',
            'phone'           => 'required|numeric|unique:users',
            'password'        => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), null, 422);
        }

        DB::beginTransaction();
        try {

            $user = User::create([
                'name'            => $request->input('name'),
                'email'           => $request->input('email'),
                'password'        => Hash::make($request->password),
                'phone'           => $request->input('phone'),
            ]);

            DB::commit();

            return $this->successResponse('User registerd successfully.', $user->toArray(), 200);

        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), null, 500);
        }

    }

    /**
    * User login function.
    * @return JsonResponse
    */
    public function login(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email|exists:users,email',
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

        return response()->json([
            'status'     => true,
            'message'    => 'User logged in successfully.',
            'token'      => $token,
            'userData'   => auth()->guard('api')->user(),
            'token_type' => 'Bearer',
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60,
            'code'       => '200',
        ], 200);
    }

    /**
    * Returning Authenticate user details.
    * @return JsonResponse
    */
    public function me():JsonResponse
    {
        try {
            $user = auth()->guard('api')->user();
            return $this->successResponse('Me user', $user, 200);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), null, 500);
        }
    }


    /**
    * user authentication session destroying.
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
