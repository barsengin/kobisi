<?php

namespace Database\Factories\Api;

use App\Models\Api\CompanyPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyPackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyPackage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => 1,
            'package_id' => 1,
        ];
    }
}
