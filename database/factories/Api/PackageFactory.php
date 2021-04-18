<?php

namespace Database\Factories\Api;

use App\Enums\PackagePeriodEnum;
use App\Models\Api\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Package::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = [100, 200, 300];
        $type = rand(1,3);

        return [
            'name' => $this->faker->name,
            'description' => \Str::random(30),
            'type' => PackagePeriodEnum::label(rand(1,3)),
            'price' => $price[$type-1],
        ];
    }
}
