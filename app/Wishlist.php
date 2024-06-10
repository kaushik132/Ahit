<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'wishlists';
    protected $fillable = ['pro_code', 'category_id', 'pro_type', 'duration','amt','title','slug','description', 'user_id','quantity','fixprice','no'];


    public function userIds(){
        return $this->belongsTo(User::class,'user_id');
    }

}
