<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsysSupervisorModel extends Model
{
    use HasFactory;
    protected $table = "arsys_supervisor";

    public function student()
    {
        return $this->hasMany(ArsysStudent::class, 'id', 'supervisor_id');
    }
}
