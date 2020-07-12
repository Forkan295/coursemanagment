<?php

namespace App;

use App\Day;
use App\Batch;
use App\Course;
use App\Student;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['schedule', 'type'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function days()
    {
        return $this->belongsToMany(Day::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
