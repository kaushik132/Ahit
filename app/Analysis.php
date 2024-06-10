<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'analyses';
    protected $fillable = ['username','website','message','email'];
}
