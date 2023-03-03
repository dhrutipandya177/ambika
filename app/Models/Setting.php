<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Setting extends Model
{
    use SoftDeletes;

    protected $table = 'settings';

    protected $fillable = ['setting_name', 'setting_value', 'status'];

}
