<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class FaqController extends Controller
{

    public function index()
    {
        $faqs = Faq::latest()->paginate(5);

        return view('backend.layouts.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('backend.layouts.faq.create');

    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        // Create the FAQ using validated data
        Faq::create($validatedData);

        // Redirect back with success message
        return redirect()->back()->with('success', 'FAQ successfully created');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return response()->json($faq);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);
        // dd($request->input('question'));
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'code' => '422',
            ], 422);
        }

        $faq = Faq::findOrFail($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return response()->json([
            'status' => true,
            'message' => 'Faq updated successfully',
            'code' => '201',
        ], 201);

    }

    // change status by click
    public function toggleStatus($id)
    {
        $faq = Faq::findOrFail($id);

        // Toggle the status
        $faq->status = $faq->status == 'Active' ? 'Deactive' : 'Active';
        $faq->save();

        // Return the new status and success message as a JSON response
        return response()->json([
            'status' => $faq->status,
            'success' => 'FAQ status successfully updated to ' . $faq->status
        ]);
    }

    // Search the data
    public function search(Request $request)
    {
        // Retrieve the search query from the request
        $search = $request->input('search');

        // Modify the query to search by QR code or token
        $faqs = Faq::when($search, function ($query, $search) {
            return $query->where('question', 'like', "%{$search}%")
                        ->orWhere('answer', 'like', "%{$search}");
        })->paginate(10);

        // Pass the search term to the view for maintaining the search state
        return view('backend.layouts.faq.index', compact('faqs', 'search'));
    }

    // bulk delete for customer order recoreds
    public function BulkDelete(Request $request)
    {
        // Validate the incoming request
        $faqIds = $request->input('faq_ids');
        if (!$faqIds || count($faqIds) === 0) {
            return redirect()->back()->with('error', 'No faq selected for deletion.');
        }

        DB::transaction(function () use ($faqIds) {
            Faq::whereIn('id', $faqIds)->delete();
        });

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Selected faq have been deleted successfully!');
    }


}
