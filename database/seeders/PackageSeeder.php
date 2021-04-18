<?php

namespace Database\Seeders;

use App\Models\Api\Package;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class PackageSeeder extends Seeder
{
    use WithFaker;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i =0; $i<5; $i++) {
            Package::factory()->create();
        }
    }
}
