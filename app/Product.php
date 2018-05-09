<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";
    public function Category(){
		return $this->belongsTo('App\Catagory','catalog_id','id');
	}
	public function manafacture(){
		return $this->belongsTo('App\Manufacture','manufacture_id','id');
	}
	public function comment()
	{
		return $this->hasMany('App\Comment');
	}
	public function productDetail()
	{
		return $this->hasMany('App\ProductDetail','product_detail','id');
	}
}
