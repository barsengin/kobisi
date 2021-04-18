<?php
namespace App\Jobs;

use App\Models\Api\CompanyPackage;
use App\Models\Api\CompanyPayment;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Payment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $currency;

    private CompanyRepositoryInterface $companyRepositories;

    private CompanyPackage $companyPackage;


    /**
     * Payment constructor.
     * @param CompanyRepositoryInterface $companyRepositories
     * @param CompanyPackage $companyPackage
     * @param string $currency
     */
    public function __construct(CompanyRepositoryInterface $companyRepositories, CompanyPackage $companyPackage, string $currency = 'TL')
    {
        $this->companyRepositories = $companyRepositories;
        $this->companyPackage = $companyPackage;
        $this->currency     = $currency;
    }

    public function handle()
    {
        $rndHash = \Hash::make(\Str::random(30)).rand(1,100);
        $successPayment = intval(substr($rndHash, -1)) % 2;

        try {

            $companyPayment = new CompanyPayment();

            $companyPayment->package_id = $this->companyPackage->package_id;
            $companyPayment->company_id = $this->companyPackage->company_id;
            $companyPayment->coast      = $this->companyPackage->package->price;
            $companyPayment->currency   = $this->currency;
            $companyPayment->status     = 0;

            if ($successPayment) {
                $companyPayment->status = 0;
            }

            $companyPayment->save();

            if ($successPayment) {
                $this->companyRepositories->setPackageExpireDate($this->companyPackage, now());
            } else {
                $this->companyRepositories->checkNoPayments($companyPayment->company_id);
            }

            return 1;

        } catch (\Exception $e) {
            \Log::info('Payment Job Error', [$this->companyPackage]);

            return 0;
        }
    }
}
