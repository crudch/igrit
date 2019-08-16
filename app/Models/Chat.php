<?php

namespace App\Models;

use Crudch\Database\Model;
use Crudch\Date\CrutchDate;
use Crudch\Database\ActiveRecord;

/**
 * Class Chat
 *
 * @package App\Models
 *
 * @property string name
 * @property string message
 * @property CrutchDate created_at
 */
class Chat extends Model
{
    use ActiveRecord;

    protected static $table = 'chat';

    protected $fillable = [
        'name',
        'message',
    ];

    public static function allById($id)
    {
        $sql = /** @lang */
            'select * from chat where id > ' . (int)$id . ' order by id desc limit 20';

        return db()
            ->query($sql)
            ->fetchAll(\PDO::FETCH_CLASS, static::class);
    }

    public static function addById($id)
    {
        $sql = /** @lang */
            'select * from chat where id < ' . (int)$id . ' order by id desc limit 21';

        return db()
            ->query($sql)
            ->fetchAll(\PDO::FETCH_CLASS, static::class);
    }
}
