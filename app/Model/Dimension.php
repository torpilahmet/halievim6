<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    protected $fillable=['name'];
    protected $table = 'dimensions';
}
