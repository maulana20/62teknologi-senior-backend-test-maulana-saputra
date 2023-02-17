<?php

namespace App\Http\Requests\Business;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use App\Rules\Business\LocaleRule;
use App\Models\Business;
use App\Models\BusinessImage as Image;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'address' => 'required|min:5',
            'location' => [
                'required',
                new LocaleRule()
            ],
            'limit' => 'required|integer',
            'latitude' => 'required|between:-90,90',
            'longitude' => 'required|between:-180,180',
            'update_images' => 'array|nullable',
            'insert_images' => 'array|nullable',
            'insert_images.*' => 'image',
        ];
    }
    
    public function getBusiness()
    {
        return [
            'name' => $this->name,
            'address' => $this->address,
            'locale' => $this->location,
            'limit' => $this->limit,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];
    }
    
    public function getImages(Business $business)
    {
        $this->syncImages($business, $this->update_images);
        if (!$this->insert_images) return null;
        return array_map(function($image) use($business) {
            return [
                'business_id' => $business->id,
                'image' => $image->storePublicly('business', 'public')
            ];
        }, $this->insert_images);
    }
    
    public function syncImages(Business $business, $maintainedImageIds)
    {
        if ($maintainedImageIds) {
            $removedImages = Image::where('business_id', $business->id)->whereNotIn('id', $maintainedImageIds)->get();
        } else {
            $removedImages = Image::where('business_id', $business->id)->get();
        }
        foreach ($removedImages as $image) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }
    }
}
