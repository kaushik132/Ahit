<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   
    protected $primaryKey = 'id';
    protected $table = 'projects';

	 
    public function projectCategory(){

        return $this->belongsTo(ProjectCategory::class,'category_id',);
    }

   
}
