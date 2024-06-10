<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItServices extends Model
{
    

    protected $primaryKey = 'id';
    protected $table = 'it_services';

  
     public function subservicename(){

        return $this->hasMany(ItSubServices::class,'it_services_id',);
    }
    public function subservicenames(){

        return $this->hasMany(ItSubServices::class,'it_services_name');
    }

 
}
