<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Inquiry extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'phone', 'product_id', 'city', 'state', 'country', 'description'
    ];

    protected $table = 'inquiries';


    public function productInfo(){
        return $this->hasOne('App\Models\Product', 'id' ,'product_id');
    }

}
