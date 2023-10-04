<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'tbl_payment_gateway';
    public $timestamps = false;
}
