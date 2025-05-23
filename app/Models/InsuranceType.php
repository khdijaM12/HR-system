<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceType extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    public function insuranceType()
{
    return $this->belongsTo(InsuranceType::class);
}

}

