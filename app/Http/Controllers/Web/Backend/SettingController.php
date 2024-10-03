<?php

namespace App\Http\Controllers\Web\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view('backend.layouts.setting.setting', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'favicon' => 'nullable|file|mimes:ico|max:1024',
        ]);

        // Retrieve the first setting record or create a new one if it doesn't exist
        $setting = Setting::first();
        if (!$setting) {
            // Create a new setting record if it doesn't exist
            $setting = new Setting();
        }

        $data = [
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ];

        // Handle favicon upload if a new file is provided
        if ($request->hasFile('favicon')) {
            // Remove old favicon if it exists and the setting is not new
            if ($setting->favicon && file_exists(public_path($setting->favicon))) {
                deleteImage($setting->favicon);
            }
            // Store the new favicon
            $faviconPath = uploadImage($request->file('favicon'), 'favicon/', Str::random(10));
            $data['favicon'] = $faviconPath;
        }

        // Update or save the setting record
        $setting->fill($data);
        $setting->save();

        // Redirect back with a success message
        return redirect()->route('admin.setting')->with('success', 'System Settings updated successfully.');
    }




}
