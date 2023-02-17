<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Business\UpdateRequest;
use App\Models\Business;
use App\Actions\Business\UpdateAction;

class BusinessController extends BaseController
{
    public function index(Request $request) : JsonResponse
    {
        $businesses = Business::all();
        return $this->sendResponse($businesses, 'Get List Business successfuly.');
    }
    
    public function show(Business $business) : JsonResponse
    {
        $business->rates;
        $business->images;
        $business->reviews;
        return $this->sendResponse($business, 'Get Detail Business successfuly.');
    }
    
    public function update(UpdateRequest $request, Business $business, UpdateAction $action) : JsonResponse
    {
        $business = $action->execute($request, $business);
        return $this->sendResponse($business, 'Updated Business successfuly.');
    }
    
    public function destroy(Business $business) : JsonResponse
    {
        $business->delete();
        return $this->sendResponse([], 'Deleted Business successfuly.');
    }
}
