<?php

namespace App;

use App\Batch;
use App\Student;
use App\Attribute;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['course_name', 'course_title', 'course_slug' , 'course_fees', 'admission_fees', 'course_description','course_period', 'is_active', 'image'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function batches()
    {
        return $this->belongsToMany(Batch::class);
    }

    public function attributes()
    {
        return $this->morphMany(Attribute::class, 'attributable');
    }

}
