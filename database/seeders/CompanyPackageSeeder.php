<?php

namespace Database\Seeders;

use App\Models\Api\Company;
use App\Models\Api\CompanyPackage;
use Illuminate\Database\Seeder;

class CompanyPackageSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1 -yearly 2- monthly

        $companies = Company::all();;

        $startDate = now();
        $endDateMonthly = now()->addMonth();
        $endDateYearly = now()->addYear();

        foreach ($companies as $company) {

            $packageId = rand(1,300)%2 + 1;
            CompanyPackage::factory()->create([
                'company_id' => $company->id,
                'package_id' => $packageId,
                'start_date' => $startDate,
                'end_date' => ($packageId == 1) ? $endDateYearly : $endDateMonthly
            ]);
        }
    }
}
