<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Business\UpdateRequest;
use App\Models\Business;
use App\Traits\ApiResponser;

class BusinessController extends Controller
{
    use ApiResponser;
    
    public function index(Request $request)
    {
        $businesses = Business::all();
        return $this->sendResponse($businesses, 'Get List Business successfuly.');
    }
    
    public function show(Business $business)
    {
        $business->rates;
        $business->images;
        $business->reviews;
        return $this->sendResponse($business, 'Get Detail Business successfuly.');
    }
    
    public function update(UpdateRequest $request, Business $business)
    {
        $business->update($request->getBusiness());
        if ($images = $request->getImages($business)) {
            $business->images()->createMany($images);
        }
        return $this->sendResponse($business, 'Updated Business successfuly.');
    }
    
    public function destroy(Business $business)
    {
        $business->delete();
        return $this->sendResponse([], 'Deleted Business successfuly.');
    }
    
    public function getImage($path)
    {
        $path = "business/" . $path;
        $image = Storage::disk('public')->get($path);
        return response($image, 200)->header('Content-Type', Storage::disk('public')->getMimeType($path));
    }
    
    public function getLocales()
    {
        $locales = json_decode(file_get_contents(Storage::disk('public')->path('business/locales.json')), true);
        return $this->sendResponse($locales, 'Get Locales Business successfuly.');
    }
}
