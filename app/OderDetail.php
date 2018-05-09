<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OderDetail extends Model
{
    protected $table="order_detail";
      public function product()
    {
    	return $this->beLongsTo('App\Product','product_id','id');
    }
}
