<?php

namespace App\Models;

use Crudch\Database\Model;

class Product extends Model
{
    protected static $table = 'products';

    protected $fillable = [
        'title',
        'description',
        'author',
        'price',
        'quantity',
    ];

    protected function setQuantity($value)
    {
        $this->{'quantity'} = (int)$value;
    }

    protected function setPrice($value)
    {
        $this->{'price'} = (float)$value;
    }
}
