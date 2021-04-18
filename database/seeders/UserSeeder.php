<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    use WithFaker;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try {
            User::create([
                'name'      => 'Admin',
                'email'     => 'admin@admin.com',
                'password'  => 'password',
                'api_token' => Str::random(60),
            ]);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
