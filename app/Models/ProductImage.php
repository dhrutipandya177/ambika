<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductImage extends Model
{
    use SoftDeletes;

    protected $table = 'product_images';

    protected $fillable = [
        'image', 'product_id' 
    ];

     protected $appends = ['image_url'];

    public function getImageUrlAttribute()
	{
		return asset('uploads/product/'.$this->attributes['image']);
	}
}
