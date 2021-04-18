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
class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    #[ArrayShape(['company_id' => "int", 'name' => "string", 'last_name' => "string", 'company_name' => "string", 'email' => "string", 'site_url' => "string", 'status' => "string"])]
    public function toArray($request): array
    {
        return [
            'company_id' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'company_name' => $this->company_name,
            'email' => $this->email,
            'site_url' => $this->site_url,
            'status' => $this->deleted_at ? 'passive' : 'active',
        ];
    }

}
