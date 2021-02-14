<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=['name', 'tc', 'email', 'phone'];
    protected $table = 'customers';
}
