<?php

namespace App\Models;

use Crudch\Database\Model;

class Product extends Model
{
    protected static $table = 'products';

    protected $fillable = [
        'title',
        'url',
        'body',
    ];
}
