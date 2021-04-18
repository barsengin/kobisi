<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CompanyPackageFormRequest;
use App\Http\Resources\Api\CompanyPackageResource;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class CompanyPackageController extends BaseController
{
    private CompanyRepositoryInterface $companyRepositories;

    /**
     * Boot repositories
     */
    public function __construct()
    {
        /** @var CompanyRepositoryInterface $companyRepositories */
        $this->companyRepositories = app(CompanyRepositoryInterface::class);
    }

    /**
     * @param CompanyPackageFormRequest $request
     * @return CompanyPackageResource
     */
    public function store(CompanyPackageFormRequest $request): CompanyPackageResource
    {
        return new CompanyPackageResource($this->companyRepositories->store($request->all()));

    }

    /**
     * @return JsonResponse
     */
    public function report(): JsonResponse
    {
        return response()->json([
            'data' => $this->companyRepositories->reportPayments(),
        ]);
    }

}
