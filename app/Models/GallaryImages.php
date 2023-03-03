<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class GallaryImages extends Model
{
    use SoftDeletes;

    protected $table = 'gallary_images';

    protected $fillable = [
        'image', 'gallary_id' 
    ];

     protected $appends = ['image_url'];

    public function getImageUrlAttribute()
	{
		return asset('uploads/gallary/'.$this->attributes['image']);
	}
}
