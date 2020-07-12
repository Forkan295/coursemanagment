<?php

namespace App;

use App\Schedule;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = ['day', 'comment'];

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class);
    }
}
