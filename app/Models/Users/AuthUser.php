<?php

namespace App\Models\Users;

class AuthUser extends User
{
    /**
     * Роли пользователей
     */
    public const ROLES = [
        'banned' => 0,
        'user'   => 1,
        'admin'  => 2,
    ];

    /**
     * @param int $id
     *
     * @return mixed
     */
    public static function findBySessionId($id)
    {
        $sql = /** @lang */
            'select * from users where id = ' . (int)$id . ' and role > ' . static::ROLES['banned'] . ' limit 1';

        return db()->query($sql)
            ->fetchObject(static::class);
    }

    /**
     * @param string $token
     *
     * @return mixed
     */
    public static function findByToken($token)
    {
        $sql = /** @lang */
            'select * from users where token = :token and role > ' . static::ROLES['banned'] . ' limit 1';

        $sth = db()->prepare($sql);
        $sth->execute(['token' => $token]);

        return $sth->fetchObject(static::class);
    }

    /**
     * @return bool
     */
    public function isUser(): bool
    {
        return isset($this->id);
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->isUser() && $this->role > static::ROLES['user'];
    }

    /**
     * @return bool
     */
    public function isGuest(): bool
    {
        return !$this->isUser();
    }
}
