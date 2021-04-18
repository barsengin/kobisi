<?php


namespace App\Http\Resources\Api;

use App\Models\Api\CompanyPackage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @mixin CompanyPackage
 *
 * @extends JsonResource<CompanyPackage>
 */
class CompanyPackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    #[ArrayShape(['status' => "string", 'start_date' => "\Carbon\Carbon", 'end_date' => "\Carbon\Carbon"])]
    public function toArray($request): array
    {
        return [
            'status' => '200',
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }

}
