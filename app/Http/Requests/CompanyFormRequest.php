<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CompanyFormRequest extends FormRequest
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
    #[ArrayShape(['site_url' => "string", 'name' => "string", 'last_name' => "string", 'company_name' => "string", 'email' => "string", 'password' => "string"])]
    public function rules(): array
    {
        return [
            'site_url' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'company_name' => 'required',
            'email' => 'required|email:filter',
            'password' => 'required',
        ];
    }
}
