<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Slider extends Model
{
    use SoftDeletes;

    protected $table = 'sliders';

    protected $fillable = [
        'name', 'image', 'description' , 'button1' , 'button1_link' , 'button2' , 'button2_link' , 'status' 
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
	{
		return asset('uploads/slider/'.$this->attributes['image']);
	}
}
