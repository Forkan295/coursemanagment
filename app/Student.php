<?php

namespace App;

use App\Batch;
use App\Course;
use App\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable 
{
    
    use Notifiable;

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
