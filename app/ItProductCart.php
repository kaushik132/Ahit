<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItProductCart extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'it_product_carts';
    protected $fillable = ['pro_code', 'category_id', 'pro_type', 'duration','amt','title','slug','description', 'user_id','quantity','fixprice','no'];


public function userId(){
    return $this->belongsTo(User::class,'user_id');
}

}
