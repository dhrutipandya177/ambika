<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Category extends Model
{
    use SoftDeletes;
    
    protected $table = 'categories';

    protected $fillable = [
        'name', 'slug', 'parent_id', 'image'
    ];

   
    protected $casts = [
        'parent_id' =>  'integer'
    ];

    protected $appends = ['parent_name','image_url'];

    public function getParentNameAttribute()
    {
        //$parentName = Category::where->('id','=',$this->attributes['parent_id'])->first();
        $parentName = DB::table('categories')->select('name')->where('id','=',$this->attributes['parent_id'])->first();
        if(!empty($parentName)){
        	return $parentName->name;
        }else{
        	return "";
        }
        //return "Parent Name";
        //return $this->attributes['parent_id'];
        //return $this->hasOne('App\Models\Category', 'id', 'parent_id');
    }

    public function setNameAttribute($value)
	{
	    $this->attributes['name'] = $value;
	    $this->attributes['slug'] = Str::slug($value);
	}

	/*public function setImageAttribute($value)
	{
		$this->attributes['image'] = asset('uploads/category/'.$value);
		//return $this->image;
	}*/

	public function getImageUrlAttribute()
	{
		return asset('uploads/category/'.$this->attributes['image']);
	}

	public function parent()
	{
	    return $this->belongsTo(Category::class, 'parent_id');
	    //return $this->belongsTo('App\Models\Category', 'parent_id');
	}

	public function children()
	{
	    return $this->hasMany(Category::class, 'parent_id');
	    //return $this->hasMany('App\Models\Category', 'parent_id');
	}

	public function subcategories()
	{
	    //return $this->hasMany(Category::class, 'parent_id');
	    return $this->hasMany('App\Models\Category', 'parent_id');
	}
}
