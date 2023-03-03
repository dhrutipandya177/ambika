<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Order extends Model
{
     use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = ['order_no','invoice_no', 'user_id', 'company_address', 'shipping_address', 'phone_no', 'gst_number', 'sub_total', 'gst_price' , 'total_amount', 'order_status', 'payment_status', 'payment_type', 'payment_info', 'notes'];

    public function orderDetails()
    {
        return $this->hasMany('\App\Models\OrdersDetail','order_id','order_id');
    }

    public function userInfo(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
