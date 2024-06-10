<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model{
  
    protected $primaryKey = 'id';
    protected $table = 'contact';

    protected $fillable = [
        'name','phone','email','message','phone','company'
    ];

   
}
