<?php

namespace App\Http\Controllers\Web\Backend;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->latest()->paginate(10);
        return view('backend.layouts.user.index', compact('users'));
    }

    public function create()
    {
        return view('backend.layouts.user.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name'          => 'required|string|min:2|max:255',
            'email'         => 'required|string|email|max:50|unique:users',
            'phone'         => 'required|numeric|unique:users',
            'password'      => 'required|string|min:6|confirmed',
            'avatar'        => 'nullable|image|mimes:jpg,png,jpeg|max:10240',
            'dob'           => 'nullable|date',
            'country'       => 'nullable|string',
            'gender'        => 'nullable|string',
            'designation'   => 'nullable|string',
            'status'        => 'required|string|in:Active,Deactive',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'name'          => $request->input('name'),
                'email'         => $request->input('email'),
                'password'      => Hash::make($request->password),
                'phone'         => $request->input('phone'),
                'dob'           => $request->input('dob'),
                'country'       => $request->input('country'),
                'gender'        => $request->input('gender'),
                'designation'   => $request->input('designation'),
                'status'        => $request->input('status'),
            ]);

            if ($request->hasFile('avatar')) {
                $avatarPath = uploadImage($request->file('avatar'), 'user/', Str::random(10));
                $user->avatar = $avatarPath;
                $user->save();
            }

            DB::commit();

            return redirect()->back()->with('success', 'New user created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            // Log the error for debugging purposes
            Log::error('User Creation Failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create the user. Please try again.');
        }
    }

    // Fetch category data for editing
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }


    // Search the data
    public function search(Request $request)
    {
        // Retrieve the search query from the request
        $search = $request->input('search');

        // Modify the query to search by QR code or token
        $users = User::where('role', 'user')->when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('phone', 'like', "%{$search}%");
        })->paginate(10);

        // Pass the search term to the view for maintaining the search state
        return view('backend.layouts.user.index', compact('users', 'search'));
    }

    // change status by click
    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);

        // Toggle the status
        $user->status = $user->status == 'Active' ? 'Deactive' : 'Active';
        $user->save();

        // Return the new status and success message as a JSON response
        return response()->json([
            'status' => $user->status,
            'success' => 'Lesson status successfully updated to ' . $user->status
        ]);
    }

    // bulk delete
    public function bulkDelete(Request $request)
    {
        $userIds = $request->input('user_ids');
        if (!$userIds || count($userIds) === 0) {
            return redirect()->back()->with('error', 'No users selected for deletion.');
        }

        DB::transaction(function () use ($userIds) {
            User::whereIn('id', $userIds)->delete();
        });

        return redirect()->back()->with('success', 'Selected users have been deleted.');
    }


}

