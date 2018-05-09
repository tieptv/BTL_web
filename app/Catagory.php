<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    protected $table="category";
    public function product(){
    	return $this->hasMany('App\Product','catalog_id','id');
    }
    
}
