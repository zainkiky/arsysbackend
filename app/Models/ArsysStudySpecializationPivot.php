<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsysStudySpecializationPivot extends Model
{
    use HasFactory;

    protected $table = "arsys_study_specialization_pivot";

    public function program()
    {
        return $this->belongsTo(ArsysStudyProgram::class, 'program_id');
    }

    public function specialization()
    {
        return $this->belongsTo(ArsysStudySpecialization::class, 'specialization_id');
    }
}
