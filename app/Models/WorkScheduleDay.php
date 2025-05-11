<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkScheduleDay extends Model
{
    
public function schedule()
{
    return $this->belongsTo(WorkSchedule::class, 'work_schedule_id');
}
  protected $fillable = [
        'work_schedule_id', // إذا كانت هذه العمود قابل للتعيين الجماعي
        'day_of_week',
        'start_time',
        'end_time',
        'break_start',
        'break_end',
        'is_day_off',
        'work_schedule_type',
    ];

}
