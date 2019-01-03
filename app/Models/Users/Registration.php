<?php

namespace App\Models\Users;

use Crudch\Database\Model;
use Crudch\Date\CrutchDate;

/**
 * Class Registration
 *
 * @property string     $email
 * @property string     $token
 * @property int        $operation
 * @property CrutchDate $created_at
 *
 * @package App\Models\Users
 */
class Registration extends Model
{
    /**
     * Время на перезапрос на почту в минутах
     *
     * @var int
     */
    public const RETRIEVED_TIME = 20;

    /**
     * Тип операции для запроса на почту
     * Регистрация
     *
     * @var int
     */
    public const REGISTRATION = 1;

    /**
     * Тип операции для запроса на почту
     * Восстановление пароля
     *
     * @var int
     */
    public const REPASS = 2;

    protected static $table = 'registration';

    /**
     * Проверяет наличие email в таблице registration с учетом времени в 20 минут
     *
     * @param string $email
     * @param int    $operation
     *
     * @return bool
     */
    public static function existsUserPreRegByEmail($email, $operation)
    {
        $sql = 'select exists(select * from registration 
          where email = :email 
          and operation = :operation 
          and created_at > date_sub(now(), interval ' . static::RETRIEVED_TIME . ' minute) 
        limit 1)';

        $sth = db()->prepare($sql);
        $sth->execute([
            'email'     => $email,
            'operation' => $operation,
        ]);

        return (bool)$sth->fetchColumn();
    }

    /**
     * @param string $email
     * @param string $token
     * @param int    $operation
     *
     * @return bool
     */
    public static function store($email, $token, $operation)
    {
        $sql = 'insert into registration (email, token, operation) 
          values (:email, :token, :operation) 
        on duplicate key update email = values (email), token = :token, operation = :operation, created_at = now()';
        $sth = db()->prepare($sql);

        return $sth->execute([
            'email'     => $email,
            'token'     => $token,
            'operation' => $operation,
        ]);
    }
}
