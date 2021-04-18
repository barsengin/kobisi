<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CompanyPackageController;
use App\Http\Controllers\Api\PackageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function() {

    Route::group(['as' => 'company.', 'prefix' => 'companies', 'middleware' => ['api']], function () {
        Route::get('/', [CompanyController::class, 'index'])->name('index');
        Route::get('{id}', [CompanyController::class, 'show'])->name('show');
        Route::post('/', [CompanyController::class, 'store'])->name('store');

        Route::group(['as' => 'package.', 'prefix' => 'package', 'middleware' => []], function () {
            Route::get('/', [CompanyPackageController::class, 'index'])->name('index');
            Route::post('/', [CompanyPackageController::class, 'store'])->name('index');
        });
    });

    Route::group(['as' => 'payment.', 'prefix' => 'reports', 'middleware' => []], function () {
        Route::get('payments', [CompanyPackageController::class, 'report'])->name('report');
    });

    Route::group(['as' => 'package.', 'prefix' => 'packages', 'middleware' => ['api']], function () {
        Route::get('/', [PackageController::class, 'index'])->name('index');
        Route::get('{id}', [PackageController::class, 'show'])->name('show');
    });

});
