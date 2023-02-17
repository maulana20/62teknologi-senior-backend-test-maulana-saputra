<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class LocaleController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) : JsonResponse
    {
        $locales = json_decode(file_get_contents(Storage::disk('public')->path('business/locales.json')), true);
        return $this->sendResponse($locales, 'Get Locales Business successfuly.');
    }
}
