<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   
    protected $primaryKey = 'id';
    protected $table = 'orders';
    protected $fillable = ['fname', 'lname','user_id', 'email', 'address','apartment','country','state','city', 'pincode','phone','amount'];

    public function userIdUser(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function countryName(){
        return $this->belongsTo(Countrys::class,'country');
    }

    

}
