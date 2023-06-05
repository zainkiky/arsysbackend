<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsysStudent extends Model
{
    use HasFactory;

    protected $table = "arsys_student";

    public function studyProgram()
    {
        return $this->hasOne(ArsysStudyProgram::class, 'id', 'program_id',);
    }

    public function studySpecialization()
    {
        return $this->hasOne(ArsysStudySpecialization::class, 'id', 'specialization_id',);
    }

    public function supervisor()
    {
        return $this->belongsTo(ArsysSupervisorModel::class, 'id', 'supervisor_id');
    }

    public function research()
    {
        return $this->hasOne(ArsysResearchModel::class, 'student_id');
    }


}
