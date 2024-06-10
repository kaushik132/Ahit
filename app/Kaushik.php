<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kaushik extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'kaushiks';
    protected $fillable = ['fname', 'lname','phone','code','email','service','mainservice','duration','endduration','description'];
}
