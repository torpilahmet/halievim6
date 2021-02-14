<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'cart_id',
        'total_price',
        'status',
        'session_id',
        'customer_id',
        'payment_method',
        'invoice_method',
        'cargo_name',
        'cargo_address',
        'cargo_phone',
        'invoice_name',
        'invoice_address',
        'invoice_tax_office',
        'invoice_tax_no'
    ];

    public function Customer(){
        return $this->belongsTo('App\Model\Customer');
    }

    public function CartDetails(){
        return $this->hasMany('App\Model\CartDetails');
    }
}
