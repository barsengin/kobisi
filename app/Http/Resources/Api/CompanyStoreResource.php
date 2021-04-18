<?php


namespace App\Http\Resources\Api;


use App\Models\Api\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @mixin Company
 *
 * @extends JsonResource<Company>
 */
class CompanyStoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    #[ArrayShape(['status' => "string", 'token' => "string", 'company_id' => "int"])]
    public function toArray($request): array
    {
        return [
            'status' => '200',
            'token' => $this->api_token,
            'company_id' => $this->id,
        ];
    }

}
