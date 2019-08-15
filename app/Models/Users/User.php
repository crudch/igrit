<?php

namespace App\Models\Users;

use Crudch\Database\ActiveRecord;
use Crudch\Database\Model;
use Crudch\Date\CrutchDate;

/**
 * Class User
 *
 * @property string     $email
 * @property string     $password
 * @property string     $token
 * @property string     $avatar
 * @property string     $first_name
 * @property int        $role
 * @property CrutchDate $created_at
 *
 * @package App\Models\Users
 */
class User extends Model
{
    use ActiveRecord;

    protected $fillable = [
        'email',
        'password',
        'token',
        'avatar',
        'first_name',
        'role',
    ];

    protected static $table = 'users';

    public function setRole($value)
    {
        $this->{'role'} = (int)$value;
    }

    public static function existsActiveUserByEmail($email)
    {
        $sql = 'select exists(select * from users where email = :email and `role` > 0)';

        $sth = db()->prepare($sql);
        $sth->execute(['email' => $email]);

        return (bool)$sth->fetchColumn();
    }
}
