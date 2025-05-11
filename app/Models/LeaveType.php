<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    protected $fillable = [
    'name',
    'days_allowed',
    'deduct_from_salary',
    'requires_approval',
    'description',
];

}
