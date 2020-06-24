<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }
}
