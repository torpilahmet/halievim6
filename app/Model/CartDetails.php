<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    protected $fillable=['order_id', 'product_id', 'dimension_id', 'piece', 'price', 'pruduct_data'];
    protected $table = 'cart_details';
}
