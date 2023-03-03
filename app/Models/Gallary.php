<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Gallary extends Model
{
    use SoftDeletes;

    protected $table = 'gallaries';

    protected $fillable = ['name', 'status'];

    public function gallaryImages()
    {
       return $this->hasMany('\App\Models\GallaryImages');
    }
    
}
