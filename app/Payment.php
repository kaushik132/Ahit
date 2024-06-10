<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = ['payment_id','payer_id','payer_email','amount','currency','fname','lname','email','address','apartment','city','states','pincode','country','phone','payment_status'];
}
