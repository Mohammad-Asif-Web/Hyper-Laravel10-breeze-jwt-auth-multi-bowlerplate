<?php

namespace App\Http\Controllers\Web\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.layouts.dashboard');
    }

    public function profile()
    {
        return view('backend.layouts.profile.profile');
    }

    // public function edit()
    // {
    //     return view('backend.layouts.profile.edit-profile');
    // }

    public function store(Request $request)
    {
        // dd($request);
        // Validate the incoming request
        $request->validate([
            'name' => 'nullable|string|max:255',
            // 'phone' => 'nullable|string|max:255',
            // 'country' => 'nullable|string|max:255',
            // 'city' => 'nullable|string|max:255',
            // 'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $admin = Auth::user();

        // Update the admin's profile
        $admin->name = $request->input('name');
        // $admin->phone = $request->input('phone');
        // $admin->country = $request->input('country');
        // $admin->city = $request->input('city');
        // $admin->address = $request->input('address');

        // Handle profile image update
        if ($request->hasFile('avatar')) {
            // Delete the old image if it exists
            if ($admin->avatar) {
                deleteImage($admin->avatar);
            }

            // Upload the new image
            $avatarPath = uploadImage($request->file('avatar'), 'user/', Str::random(10));
            $admin->avatar = $avatarPath;
        }

        $admin->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function updateEmail(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $admin = Auth::user();

        // Check if the provided password matches the current password
        if (!Hash::check($request->input('password'), $admin->password)) {
            return redirect()->back()->with(['error' => 'The provided password does not match your current password.']);
        }

        // Update the email
        $admin->email = $request->input('email');
        $admin->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Email updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'currentpassword' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = Auth::user();

        // Check if the provided current password matches the stored password
        if (!Hash::check($request->input('currentpassword'), $admin->password)) {
            return redirect()->back()->with(['error' => 'The current password does not match our records.']);
        }

        // Update the password
        $admin->password = Hash::make($request->input('password'));
        $admin->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Password updated successfully.');
    }



}
