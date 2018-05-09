<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comment";
     public function user(){
    	return $this->beLongsTo('App\User','user_id','id');
    }
    public function product(){
    	return $this->beLongsTo('App\Product','product_id','id');
    }
    
}
