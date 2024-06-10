<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    //

    protected $fillable = [
        'name'
    ];

    protected $primaryKey = 'id';
    protected $table = 'project_category';

  
     public function projects(){

        return $this->hasMany(Project::class,'category_id');
    }
     public function itproject(){

        return $this->hasMany(ItProduct::class,'category_id');
    }

 
}
