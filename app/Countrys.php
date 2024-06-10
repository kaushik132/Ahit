<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countrys extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'countrys';

    public function loda(){
        return $this->hasMany(Order::class,'country');
    }
}
