<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'quotation';

    protected $fillable = ['fname', 'lname', 'email', 'service','duration','description','image'];



}
