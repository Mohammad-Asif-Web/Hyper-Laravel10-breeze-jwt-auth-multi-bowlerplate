<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use \Illuminate\Support\Facades\DB;
use App\Models\Journal;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    use ApiResponseTrait;

    /**
    * Fetching a resource from storage.
    * @return JsonResponse
    */
    public function updateProfile(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|min:2|max:255',
            'email' => 'nullable|string|email|max:50|unique:users,email,' . auth()->guard('api')->id(),
            'phone' => 'nullable|numeric|unique:users,phone,' . auth()->guard('api')->id(),
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg|max:10240',
            'dob' => 'nullable|date',
            'country' => 'nullable|string',
            'gender' => 'nullable|string',
            'designation' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), null, 422);
        }

        $user = auth()->guard('api')->user();

        try {
            // Update user data
            $user->fill($request->only(['name', 'email', 'phone', 'dob', 'country', 'gender', 'designation']));

            // Handle profile image update
            if ($request->hasFile('avatar')) {
                if ($user->avatar) {
                    deleteMedia($user->avatar);
                }

                $avatarPath = uploadImage($request->file('avatar'), 'user/', Str::random(10));
                $user->avatar = $avatarPath;
            }

            $user->save();

            return $this->successResponse('User profile updated successfully', $user->only([
                'id', 'name', 'email', 'phone', 'avatar', 'dob', 'country', 'gender', 'designation'
            ]), 200);
        } catch (Exception $e) {
            return $this->errorResponse('Something went wrong.', null, 500);
        }
    }




}
