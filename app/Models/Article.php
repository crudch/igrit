<?php

namespace App\Models;

use Crudch\Database\Model;

class Article extends Model
{
    protected static $table = 'articles';

    protected $fillable = [
        'title',
        'img',
        'short',
        'body',
        'activity',
    ];
}
