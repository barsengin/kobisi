<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Http\Request;

class SanctumGuard
{
    /**
     * Create a new guard instance.
     *
     * @param AuthFactory $auth
     * @param int|null $expiration
     */
    public function __construct(protected AuthFactory $auth, protected ?int $expiration = null)
    {
    }

    /**
     * Retrieve the authenticated user for the incoming request.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        if ($token = $request->bearerToken()) {
            return User::where('api_token', hash('sha256', $token))->first();
        }

        return null;
    }
}
