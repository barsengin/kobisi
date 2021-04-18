<?php

namespace App\Rules;

use App\Models\Api\Package;
use Illuminate\Contracts\Validation\Rule;

class CompanyPackageExistRule implements Rule
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
        return (bool) Package::value('id');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.exists', ['attribute' => 'package']);
    }
}
