<?php

namespace App\Repositories;

use App\Models\Api\Company;
use App\Models\Api\CompanyPackage;
use App\Models\Api\CompanyPayment;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class CompanyRepositories implements CompanyRepositoryInterface
{
    public function get($id)
    {
    }


    public function all()
    {
    }


    public function delete($id)
    {
    }

    /**
     * @param array $attributes
     * @return CompanyPackage
     */
    public function store(array $attributes): CompanyPackage
    {
        $companyPackage = new CompanyPackage();

        $startDate = now();
        $attributes['start_date'] =$startDate;

        $companyPackage->fill($attributes);

        $companyPackage->save();

        $this->setPackageExpireDate($companyPackage, $companyPackage->start_date);

        return $companyPackage;
    }


    /**
     * @param CompanyPackage $companyPackage
     * @param string $endDate
     * @return void
     */
    public function setPackageExpireDate(CompanyPackage $companyPackage, string $endDate): void
    {
        if($companyPackage->package->type == 'weekly') {
            $endDate = Carbon::createFromFormat('Y-m-d H:i:s',$endDate)->addDays(7);
        }

        if($companyPackage->package->type == 'monthly') {
            $endDate = Carbon::createFromFormat('Y-m-d H:i:s',$endDate)->addMonth();
        }
        if($companyPackage->package->type == 'yearly') {
            $endDate =Carbon::createFromFormat('Y-m-d H:i:s',$endDate)->addYear();
        }

        $companyPackage->end_date = $endDate;
        $companyPackage->save();
    }

    /**
     * @param int|null $companyId
     */
    public function checkNoPayments(int $companyId = null)
    {
        $companies = CompanyPayment::select(\DB::raw("company_id,count(company_id) AS count"))
            ->groupBy('company_id')
            ->having('count','>=',3)
            ->when($companyId, function($query, $companyId) {
                /* @var Builder $query */
                $query->where('company_id', $companyId);
            })
            ->get()
            ->map(function ($model) {
                return $model->company_id;
            })->toArray();

        $this->setPassive($companies);
    }

    /**
     * @param array $companies
     * @return void
     */
    public function setPassive(array $companies): void
    {
        Company::whereIn('id', $companies)
            ->where('deleted_at',null)
            ->delete();
    }


    /**
     * @return array
     */
    public function reportPayments(): array
    {
        return \DB::table('company_payments')
            ->join('companies', 'companies.id', '=', 'company_payments.company_id')
            ->join('packages', 'packages.id', '=', 'company_payments.package_id')
            ->select([
                'companies.name AS Company Name',
                'packages.name AS Package Name',
                'company_payments.coast',
                'company_payments.status',
                'company_payments.created_at AS Payment Date',
            ])
            ->get()
            ->toArray();

    }
}
