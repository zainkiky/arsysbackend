<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsysEvent extends Model
{
    use HasFactory;

    protected $table = "arsys_event";

    public function eventType()
    {
        return $this->hasMany(EventTypeModel::class, 'id', 'event_id');
    }
}
