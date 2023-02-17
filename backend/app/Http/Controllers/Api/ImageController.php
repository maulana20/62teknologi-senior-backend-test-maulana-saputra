<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ImageController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($folder, $file) : Response
    {
        $path = "{$folder}/{$file}";
        $image = Storage::disk('public')->get($path);
        return response($image, 200)->header('Content-Type', Storage::disk('public')->getMimeType($path));
    }
}
