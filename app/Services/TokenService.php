<?php
namespace App\Services;
use Illuminate\Contracts\Auth\Factory as AuthFactory;

class TokenService
{
    public function __construct()
    {
        return auth()->shouldUse('api');
    }

    public function respondWithToken($token, $user)
    {
        return [
            'user' => $user,
            'token' => $token,
            'token_type'   => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ];
    }
}
