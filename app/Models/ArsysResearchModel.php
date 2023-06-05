<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsysResearchModel extends Model
{
    use HasFactory;
    protected $table = "arsys_research";

    public function student()
    {
        return $this->belongsTo(ArsysStudent::class, 'student_id');
    }

    public function supervisors()
    {
        return $this->belongsToMany(ArsysSupervisorModel::class, 'arsys_research_supervisor', 'research_id', 'supervisor_id');
    }
}
