<?php

namespace App\Rules;

use App\Models\Api\Company;
use Illuminate\Contracts\Validation\Rule;

class CompanyExistRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (bool) Company::where('id',$value)->get('id');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.exists', ['attribute' => 'company']);
    }
}
