<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class OrdersDetail extends Model
{
     use SoftDeletes;

    protected $table = 'orders_details';

    protected $fillable = ['order_id', 'product_id','product_name', 'product_unit', 'price', 'total_price', 'quantity', 'product_attributes', 'product_info'];

    public function productInfo(){
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
