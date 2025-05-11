<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'max_late_minutes', 'max_absent_days', 'overtime_enabled', 'allow_shift_swap', 'description'
    ];

    // العلاقة مع شركة
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

