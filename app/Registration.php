<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'full_name', 'email', 'phone', 'course','marital_status','address','city','facebook','skype'
    ];
}
