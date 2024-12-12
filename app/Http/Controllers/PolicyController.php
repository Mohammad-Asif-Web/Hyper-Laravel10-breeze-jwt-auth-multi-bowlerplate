<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{

    public function edit()
    {
        // Retrieve the first policy entry or create a new instance if none exists
        $policy = Policy::first() ?? new Policy();
        return view('backend.layouts.policy.policy', compact('policy'));
    }

    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'description' => 'nullable|string',
        ]);

        // Retrieve or create the policy record
        $policy = Policy::first() ?? new Policy();

        // Update policy content
        $policy->description = $request->description;
        $policy->save();

        // Redirect back with success message
        return back()->with('success', 'Policy successfully updated');
    }

}
