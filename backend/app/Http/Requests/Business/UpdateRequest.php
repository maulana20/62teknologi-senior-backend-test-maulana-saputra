<?php

namespace App\Http\Requests\Business;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\LocaleRule;

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
            'locale' => [
                'required',
                new LocaleRule()
            ],
            'limit' => 'required|integer'
        ];
    }
}
