<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'faqs';
    protected $fillable = ['question','answer'];


}
