<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Traits\ApiResponser;

class BusinessController extends Controller
{
    use ApiResponser;
    
    public function index(Request $request)
    {
        $businesses = Business::all();
        return $this->sendResponse($businesses, 'Get List Business.');
    }
    
    public function show(Business $business)
    {
        $business->rates;
        $business->images;
        $business->reviews;
        return $this->sendResponse($business, 'Get Detail Business.');
    }
}
