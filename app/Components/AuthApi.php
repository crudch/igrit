<?php

namespace App\Components;

use App\Models\Users\AuthUser;

/**
 * Class Auth
 *
 * @package App\Component
 */
class AuthApi
{
    /**
     * @var AuthUser
     */
    protected $user;

    public function __construct()
    {
        $this->init();
    }

    /**
     * @return AuthUser
     */
    public function getAuthUser()
    {
        return $this->user;
    }

    protected function init()
    {
        $bearer = request()->headers('Authorization');

        if (0 === strpos($bearer, 'Bearer')
            && ($token = substr($bearer, 7))
            && $user = AuthUser::findByToken($token)
        ) {
            return $this->user = $user;
        }

        return $this->user = new AuthUser();
    }
}
