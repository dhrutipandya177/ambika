<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductAttributeHeight extends Model
{
    use SoftDeletes;

    protected $table = 'product_attribute_heights';

    protected $fillable = [
        'height', 'unit', 'product_id' 
    ];

}
