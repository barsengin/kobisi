<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('package_id');
            $table->integer('coast');
            $table->string('currency');
            $table->integer('status'); // 1 : success, 2 : failed
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('package_id')->references('id')->on('packages');

            $table->index('company_id');
            $table->index('package_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_payments');
    }
}
