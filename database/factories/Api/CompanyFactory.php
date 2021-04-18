<?php

namespace Database\Factories\Api;

use App\Models\Api\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'site_url' => $this->faker->url,
            'name' => $this->faker->name,
        ];
    }
}
