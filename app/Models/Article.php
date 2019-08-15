<?php

namespace App\Models;

use Crudch\Database\Model;
use Crudch\Database\ActiveRecord;

class Article extends Model
{
    use ActiveRecord;

    protected static $table = 'articles';

    protected $fillable = [
        'title',
        'img',
        'short',
        'body',
        'activity',
    ];
}
