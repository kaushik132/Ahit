<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItSubServices extends Model
{
    
    protected $primaryKey = 'id';
    protected $table = 'it_sub_services';
   
   public function servicename(){

        return $this->belongsTo(ItServices::class,'it_services_id',);
    }
    public function servicenames(){

        return $this->belongsTo(ItServices::class,'it_services_name',);
    }
  
 }
