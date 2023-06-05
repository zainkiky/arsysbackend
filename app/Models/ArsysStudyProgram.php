<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsysStudyProgram extends Model
{
    use HasFactory;

    protected $table = "arsys_study_program";

    public function specializations()
    {
        return $this->belongsToMany(ArsysStudySpecialization::class, 'arsys_study_specialization_pivot', 'program_id', 'specialization_id');
    }
}
