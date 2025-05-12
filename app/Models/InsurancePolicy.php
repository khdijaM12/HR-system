<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class InsurancePolicy extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'insurance_type_id',
        'company_id',
        'company_name',
        'contribution_percent',
        'employee_percent',
        'start_date',
        'end_date'
    ];
    public function insuranceType()
{
    return $this->belongsTo(InsuranceType::class);
}
}


