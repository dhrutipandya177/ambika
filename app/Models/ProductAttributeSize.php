<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductAttributeSize extends Model
{
    use SoftDeletes;

    protected $table = 'product_attribute_sizes';

    protected $fillable = [
        'size', 'unit', 'product_id' 
    ];
}
