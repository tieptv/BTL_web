<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $table="manafacture";
     public function product(){
    	return $this->hasMany('App\Product','product_id','id');
    }
}
