<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItProduct extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'itproduct';
    protected $fillable = ['pro_code', 'category_id', 'pro_type', 'duration','amt','gst','title','slug','description','pro_question','pro_answer','seo_description','seo_keyword','seo_title','page_1','page_2','page_3','page_4','page_5','page_6','page_7','page_8','page_9','page_10',
];

	 
    public function productCategory(){

        return $this->belongsTo(ProjectCategory::class,'category_id',);
    }

}
