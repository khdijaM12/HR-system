<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructureLevel extends Model
{
    use HasFactory;
     protected $fillable = ['name'];
    //

      public function structures()
    {
        return $this->hasMany(CompanyStructure::class, 'structure_level_id');
    }
}
