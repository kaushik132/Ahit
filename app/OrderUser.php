<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderUser extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'order_users';
    protected $fillable = ['pro_code', 'category_id', 'pro_type', 'duration','amt','title','slug','description', 'user_id','quantity','fixprice','no','status'];

    public function userIdsss(){
        return $this->belongsTo(User::class,'user_id');
    }
}
