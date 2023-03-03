<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
	//use HasApiTokens, Notifiable;
   
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'profile_pic',
        'password',
        'phone_no',
        'profile_pic',
        'company_name',
        'company_address',
        'company_birth_date',
        'gst_no',
        'last_login',
      ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    public function getProfilePicAttribute($value) {
        return !empty($value) ?  asset('uploads/profile').'/'.$value : asset('default/user_profile.png');
    }

    public function getUserTypeAttribute($value) {
        return ($value==1) ?  "User" : "Dealer";
    }

    public function CountryDetail(){
        return $this->hasOne('App\Models\Country','id','country_id');
    }
    public function UserMetaDetail(){
        return $this->hasOne('App\UserMeta','user_id','id');
    }


}
