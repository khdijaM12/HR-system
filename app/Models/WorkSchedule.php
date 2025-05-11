<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkSchedule extends Model
{
    public function days()
{
    return $this->hasMany(WorkScheduleDay::class);
}

 protected $fillable = [
        'name',
        
    ];
}
