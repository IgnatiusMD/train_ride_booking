<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleClass extends Model
{
    use HasFactory;

    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }

    public function classType() {
        return $this->belongsTo(TrainClass::class, 'class_id');
    }

}
