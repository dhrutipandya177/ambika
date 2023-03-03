<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseApplication extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'name',
        'course',
        'parent_name',
        'address',
        'pincode',
        'telephone',
        'mobileno',
        'emailid',
        'pursue_course_through',
        'date_of_birth',
        'gender',
        'nationality',
        'profile_image',
        'resume',
        'degree_certificate',
        'provisional_certificate'
    ];

    public function getProfileImageAttribute($value) {
        return !empty($value) ?  asset('storage/uploads/profile_images').'/'.$value : '';
    }
    public function getResumeAttribute($value) {
        return !empty($value) ?  asset('storage/uploads/resume').'/'.$value : '';
    }
    public function getDegreeCertificateAttribute($value) {
        return !empty($value) ?  asset('storage/uploads/degree_certificate').'/'.$value : '';
    }
    public function getProvisionalCertificateAttribute($value) {
        return !empty($value) ?  asset('storage/uploads/provisional_certificate').'/'.$value : '';
    }
}
