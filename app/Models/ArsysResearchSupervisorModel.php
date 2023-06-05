<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsysResearchSupervisorModel extends Model
{
    use HasFactory;
    protected $table = "arsys_research_supervisor";

    public function research()
    {
        return $this->belongsTo(ArsysResearchModel::class, 'research_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(ArsysSupervisorModel::class, 'supervisor_id');
    }
}
