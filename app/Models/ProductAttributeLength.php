<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductAttributeLength extends Model
{
    use SoftDeletes;

    protected $table = 'product_attribute_lengths';

    protected $fillable = [
        'lenght', 'unit', 'product_id' 
    ];
}
