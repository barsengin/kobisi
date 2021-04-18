<?php

namespace App\Console\Commands;

use App\Jobs\Payment;
use App\Models\Api\CompanyPackage;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\Console\Command;

class CheckPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payments:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        /** @var CompanyRepositoryInterface $companyRepository */
        $companyRepository = app(CompanyRepositoryInterface::class);

        $checkPackages = CompanyPackage::where('end_date','<',today())->get();

        foreach ($checkPackages as $checkPackage) {

            $job = new  Payment($companyRepository, $checkPackage,'TL');

            dispatch($job);
        }

        return 0;
    }
}
