<?php

namespace App;

use App\User;
use App\Student;
use Illuminate\Database\Eloquent\Model;

class PaymentRecord extends Model
{
    

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function student()
    {
        return $this->belongsTo(Student::class);
    }
}
