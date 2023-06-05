<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsysStudySpecialization extends Model
{
    use HasFactory;

    protected $table = "arsys_study_specialization";

    public function programs()
    {
        return $this->belongsToMany(ArsysStudyProgram::class, 'arsys_study_specialization_pivot', 'specialization_id', 'program_id');
    }
}
