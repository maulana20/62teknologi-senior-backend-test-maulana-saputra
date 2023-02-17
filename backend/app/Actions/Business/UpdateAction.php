<?php

namespace App\Actions\Business;

use App\Http\Requests\Business\UpdateRequest;
use App\Models\Business;

class UpdateAction
{
    public function execute(UpdateRequest $request, Business $business) : object
    {
        $business->update($request->getBusiness());
        if ($images = $request->getImages($business)) {
            $business->images()->createMany($images);
        }
        return $business;
    }
}
