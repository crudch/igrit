<?php

namespace App\Models;

use Crudch\Database\ActiveRecord;
use Crudch\Database\Model;

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
