<?php

namespace App\Models\Api;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Api\Company
 *
 * @property  string $name
 * @property  string $last_name
 * @property  string $company_name
 * @property  string $site_url
 * @property  string $email
 * @property  string $password
 * @property  int    $id
 * @property  string $api_token
 * @property  Carbon $deleted_at
 *
 * @mixin Eloquent
 * @property-read  CompanyPackage $companyPackage
 * @property-read  CompanyPayment $companyPayment
 *
 */
class Company extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'company_name',
        'site_url',
        'api_token',
        'email',
        'password',
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
