<?php

namespace App;

use App\Content;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{

    protected $fillable = ['attribute','attributable_id','attributable_type'];

    public function attributable()
    {
        return $this->morphTo();
    }

    function contents()
    {
        return $this->belongsToMany(Content::class);
    }
}
