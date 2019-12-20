<?php
namespace App\Services;

class TokenService
{

    public function __construct(User $user)
    {
        $user = $this->user;
    }

    public function respondWithToken($token)
    {
        return [
            'token' => $token,
            'token_type'   => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ];
    }
}
