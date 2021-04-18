<?php

namespace Database\Seeders;

use App\Models\Api\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i =0; $i<50; $i++) {
            Company::factory()->create();
        }
    }
}
