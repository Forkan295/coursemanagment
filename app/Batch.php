<?php

namespace App;

use App\Batch;
use App\Course;
use App\Student;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
