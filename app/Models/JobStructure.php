<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobTitle;
use App\Models\Role;
use App\Models\Level;

class JobStructure extends Model
{
    protected $fillable = [
        'role_id',
        'job_title_id',
        'level_id',
        'base_salary',
        'description',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
