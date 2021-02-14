<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable=['image', 'sku'];
    protected $table = 'products';
}
