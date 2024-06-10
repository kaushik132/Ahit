<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    //

    protected $fillable = [
        'name'
    ];

    protected $primaryKey = 'id';
    protected $table = 'blog_category';

  
     public function blogs(){

        return $this->hasMany(Blog::class,'category_id');
    }

 
}
