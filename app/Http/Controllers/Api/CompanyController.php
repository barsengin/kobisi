<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CompanyFormRequest;
use App\Http\Resources\Api\CompanyResource;
use App\Http\Resources\Api\CompanyStoreResource;
use App\Models\Api\Company;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller as BaseController;

class CompanyController extends BaseController
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $company = \DB::table('companies')->get();

        return CompanyResource::collection($company);
    }

    /**
     * @param int $id
     * @return CompanyResource
     */
    public function show(int $id): CompanyResource
    {
        $company = new Company();

        return new CompanyResource($company->find($id));
    }

    /**
     * @param CompanyFormRequest $companyFormRequest
     * @return CompanyStoreResource
     */
    public function store(CompanyFormRequest $companyFormRequest): CompanyStoreResource
    {
        $company = new Company();

        $companyFormRequest['api_token'] = $company->createToken('auth-token')->plainTextToken;
        $company->fill($companyFormRequest->all());

        $company->save();

        return new CompanyStoreResource($company);

    }

}
