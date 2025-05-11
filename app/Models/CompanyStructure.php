<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyStructure extends Model
{
    //
    use HasFactory;
   protected $fillable = ['name', 'structure_level_id', 'parent_id'];

    public function structureLevel()
    {
        return $this->belongsTo(StructureLevel::class, 'structure_level_id');
    }

    public function parent()
    {
        return $this->belongsTo(CompanyStructure::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(CompanyStructure::class, 'parent_id');
    }
}
