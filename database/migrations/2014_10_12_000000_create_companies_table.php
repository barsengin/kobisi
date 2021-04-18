<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_url');
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->string('name');
            $table->string('last_name');
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('password');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->index('name');
            $table->index('site_url');
            $table->index('company_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
