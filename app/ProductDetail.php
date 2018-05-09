<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table="product_detail";
    public function manafacture(){
		return $this->belongsTo('App\Product','product_id','id');
	}
}
