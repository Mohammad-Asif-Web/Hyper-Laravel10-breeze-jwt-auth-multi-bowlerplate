<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Policy;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    use ApiResponseTrait;

    /**
    * Fetching a resource from storage.
    * @return JsonResponse
    */
    public function getFaqList():JsonResponse
    {
        $faqs = Faq::all();

        if ($faqs->isEmpty()) {
            return $this->errorResponse('No FAQs found.', [], 200); // 200 with empty array for no FAQs
        }

        return $this->successResponse('FAQs fetched successfully.', $faqs, 200);
    }

    /**
    * Fetching a resource from storage.
    * @return JsonResponse
    */
    public function searchFaq(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'query' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Invalid search query.', $validator->errors()->first(), 422);
        }

        $query = $request->input('query');

        // Fetch FAQs where the question matches the search query
        $faqs = Faq::where('question', 'LIKE', '%' . $query . '%')
                ->where('status', 'Active') // Optional: Only fetch active FAQs
                ->get();

        if ($faqs->isEmpty()) {
            return $this->errorResponse('No FAQs found matching your query.', [], 404);
        }

        return $this->successResponse('FAQs fetched successfully.', $faqs, 200);
    }

        /**
    * Fetching a resource from storage.
    * @return JsonResponse
    */
    public function getPrivacyPolicy(): JsonResponse
    {
        $policy = Policy::first();

        // Check if the policy record exists
        if (!$policy) {
            return $this->errorResponse('No policy found.', null, 404); // 404 for not found
        }

        return $this->successResponse('Privacy & Policy fetched successfully.', $policy, 200);
    }



}
