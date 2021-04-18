<?php

namespace App\Http\Requests;

use App\Rules\CompanyExistRule;
use App\Rules\PackageExistRule;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CompanyPackageFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['company_id' => "array", 'package_id' => "array"])]
    public function rules(): array
    {
        return [
            'company_id' => [
                'required',
                'int',
                new CompanyExistRule()
            ],
            'package_id' => [
                'required',
                'int',
                new PackageExistRule()
            ],
        ];
    }
}
