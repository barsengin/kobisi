<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Api\CompanyPayment
 *
 * @property  int $company_id
 * @property  int $package_id
 * @property  int $coast
 * @property  int $status
 * @property  string $currency
 * @property  string $description
 *
 * @property-read CompanyPackage $companyPackage
 */
class CompanyPayment extends Model
{

    protected  $table = 'company_payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'package_id',
        'coast',
        'currency',
        'status',   // 1 -> success, 2 -> failed
    ];

    /**
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    /**
     * @return BelongsTo
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class,'package_id');
    }


}
