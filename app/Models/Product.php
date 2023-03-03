<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name', 'slug', 'price', 'category_id', 'subcategory_id', 'description', 'profile_drawing', 'profile_drawing_image', 'order_drawing', 'order_drawing_image', 'show_in_application', 'status'];

    protected $appends = ['profile_drawing_image_url', 'order_drawing_image_url'];

    /**
     * @var array
     */
    protected $casts = [
        'quantity'  =>  'integer',
        'category_id'  =>  'integer',
        'subcategory_id'  =>  'integer',
        'status'    =>  'boolean',
        //'featured'  =>  'boolean'
    ];

    public function setNameAttribute($value)
	{
	    $this->attributes['name'] = $value;
	    $this->attributes['slug'] = Str::slug($value);
	}

    public function getProfileDrawingImageUrlAttribute()
    {
        return asset('uploads/product_profile/'.$this->attributes['profile_drawing_image']);
    }

    public function getOrderDrawingImageUrlAttribute()
    {
        return asset('uploads/product_order/'.$this->attributes['order_drawing_image']);
    }

    /*public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }

    public function category()
    {
        //return $this->hasOne('App\Models\Category', 'id', 'category_id');
        return $this->hasOne('App\Models\Category', 'id', 'subcategory_id');
    }*/

    public function categoryInfo(){
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function subcategoryInfo(){
        return $this->hasOne('App\Models\Category', 'id', 'subcategory_id');
    }

    public function productImages()
    {
        //return $this->hasMany(ProductImage::class);
        return $this->hasMany('\App\Models\ProductImage');
    }

    public function productHeights()
    {
        return $this->hasMany('\App\Models\ProductAttributeHeight');
    }

    public function productWidths()
    {
        return $this->hasMany('\App\Models\ProductAttributeWidth');
    }

    public function productLengths()
    {
        return $this->hasMany('\App\Models\ProductAttributeLength');
    }

    public function productThickness()
    {
        return $this->hasMany('\App\Models\ProductAttributeThickness');
    }

    public function productSizes()
    {
        return $this->hasMany('\App\Models\ProductAttributeSize');
    }

    public function productColors()
    {
        return $this->hasMany('\App\Models\ProductAttributeColor');
    }
}
