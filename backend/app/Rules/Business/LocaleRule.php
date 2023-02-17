<?php

namespace App\Rules\Business;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class LocaleRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $names = json_decode(file_get_contents(Storage::disk('public')->path('business/locales.json')), true);
        if (!array_key_exists($value, $names)) return false;
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ":attribute is invalid";
    }
}
