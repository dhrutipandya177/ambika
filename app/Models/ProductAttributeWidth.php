<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductAttributeWidth extends Model
{
    use SoftDeletes;

    protected $table = 'product_attribute_widths';

    protected $fillable = [
        'width', 'unit', 'product_id' 
    ];
}
