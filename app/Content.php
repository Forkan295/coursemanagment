<?php

namespace App;

use App\Batch;
use App\Course;
use App\Attribute;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    
    function course()
    {
        return $this->belongsTo(Course::class);
    }
    function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }
}
