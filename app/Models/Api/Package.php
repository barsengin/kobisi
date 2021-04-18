<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *  App\Models\Api\Package
 *
 * @property  string $name
 * @property  string $type
 * @property  string $description
 * @property  string $price
 *
 * @property-read CompanyPackage $companyPackage
 */
class Package extends Model
{
    use HasFactory;

    protected  $table = 'packages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'type',
        'price'
    ];

    /**
     * @return HasMany
     */
    public function packageCompany(): HasMany
    {
        return $this->hasMany(CompanyPackage::class,'package_id');
    }

    /**
     * @return HasMany
     */
    public function paymentCompany(): HasMany
    {
        return $this->hasMany(CompanyPayment::class,'package_id');
    }

}
