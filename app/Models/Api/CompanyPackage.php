<?php

namespace App\Models\Api;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Api\CompanyPackage
 *
 * @property int $package_id
 * @property int $company_id
 * @property Carbon $start_date
 * @property Carbon $end_date
 *
 * @mixin Eloquent
 *
 * @property-read Company $company
 * @property-read Package $package
 */
class CompanyPackage extends Model
{

    protected  $table = 'company_packages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'package_id',
        'company_id',
        'start_date',
        'end_date',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
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
