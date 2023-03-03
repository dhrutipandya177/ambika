<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'message',
        'type',
        'parameter',
        'sender_id',
        'receiver_id',
        'read',
    ];

    public function receiver()
    {
        return $this->belongsTo('App\User', 'receiver_id');
    }
}
