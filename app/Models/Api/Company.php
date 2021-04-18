<?php

namespace App\Models\Api;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Api\Company
 *
 * @property  string $name
 * @property  string $site_url
 * @property  int    $id
 * @property  Carbon $deleted_at
 *
 * @mixin Eloquent
 * @property-read  CompanyPackage $companyPackage
 * @property-read  CompanyPayment $companyPayment
 *
 */
class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'site_url',
    ];

    /**
     * @return HasMany
     */
    public function companyPackage(): HasMany
    {
        return $this->hasMany(CompanyPackage::class,'company_id');
    }

    /**
     * @return HasMany
     */
    public function companyPayment(): HasMany
    {
        return $this->hasMany(CompanyPayment::class,'company_id');
    }
}
