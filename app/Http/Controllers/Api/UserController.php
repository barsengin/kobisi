<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CompanyFormRequest;
use App\Models\Api\Company;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    /**
     * @param CompanyFormRequest $request
     * @return JsonResponse
     */
    public function register(CompanyFormRequest $request): JsonResponse
    {
        $company = new Company();

        $user = User::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
        ]);

        $api_token = $user->createToken('auth-token')->plainTextToken;

        $company->fill([
            'name' => $request['company_name'],
            'site_url' => $request['site_url'],
        ]);

        $company->save();

        return response()->json([
            'status' => '200',
            'token' => $api_token,
            'company_id' => $company->id,
        ]);

    }

}
