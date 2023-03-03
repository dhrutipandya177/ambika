<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductAttributeColor extends Model
{
    use SoftDeletes;

    protected $table = 'product_attribute_colors';

    protected $fillable = [
        'color', 'unit', 'product_id' 
    ];
}
