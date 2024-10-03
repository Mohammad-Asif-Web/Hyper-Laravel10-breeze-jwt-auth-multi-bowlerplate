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

    public function updateProfile(Request $request)
    {
        // Validate the incoming request
        $validator =  $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|unique:users|max:255',
            'phone' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg|max:10240',
        ]);

        // dd($request->hasFile('avatar'));

        $admin = Auth::user();

        // Update the admin's profile
        $admin->name = $request->input('name');
        $admin->phone = $request->input('phone');
        $admin->location = $request->input('location');
        $admin->city = $request->input('city');
        $admin->language = $request->input('language');

        // Handle profile image update
        if ($request->hasFile('avatar')) {
            // Delete the old image if it exists
            // dd($request->file('avatar'));
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

    public function updateSocial(Request $request)
    {
        // Validate the input, ensuring proper URL format
        $request->validate([
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'skype' => 'nullable|url',
        ]);

        // Get the authenticated user
        $admin = Auth::user();

        // Update the user's social media links
        $admin->update([
            'facebook_url' => $request->facebook,
            'twitter_url' => $request->twitter,
            'skype_url' => $request->skype,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Social sites updated successfully');
    }




}
