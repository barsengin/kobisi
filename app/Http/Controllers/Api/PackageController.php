<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\PackageResource;
use App\Models\Api\Package;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller as BaseController;

class PackageController extends BaseController
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $company = \DB::table('packages')->get();

        return PackageResource::collection($company);
    }

    /**
     * @param int $id
     * @return PackageResource
     */
    public function show(int $id): PackageResource
    {
        $package = new Package();

        return new PackageResource($package->find($id));
    }

}
