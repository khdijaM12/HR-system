<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'name', 'rate_percent', 'applies_to_salary', 'description'
    ];

    // العلاقة مع شركة
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

