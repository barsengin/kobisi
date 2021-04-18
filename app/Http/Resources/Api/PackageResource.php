<?php


namespace App\Http\Resources\Api;

use App\Models\Api\Package;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @mixin Package
 *
 * @extends JsonResource<Package>
 */
class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    #[ArrayShape(['name' => "string", 'description' => "string", 'type' => "string", 'price' => "string"])]
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'price' => $this->price,
        ];
    }

}
