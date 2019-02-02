<?php

namespace App\Models;

use Crudch\Database\Model;

class Chat extends Model
{
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
}
