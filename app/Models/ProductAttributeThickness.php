<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductAttributeThickness extends Model
{
    use SoftDeletes;

    protected $table = 'product_attribute_thickness';

    protected $fillable = [
        'thickness', 'unit', 'product_id' 
    ];
}
