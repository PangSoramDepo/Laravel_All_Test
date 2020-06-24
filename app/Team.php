<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    // protected $fillable=[];
    // protected $guarded=[];

    public function scopeActive($query)
    {
        return $query->where('status','active');
    }

    public function scopeStatus($query,$status)
    {
        return $query->where('status',$status);
    }
}
