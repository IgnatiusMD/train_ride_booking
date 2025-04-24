<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function train() {
        return $this->belongsTo(Train::class);
    }

    public function originStation() {
        return $this->belongsTo(Station::class, 'origin_id');
    }

    public function destinationStation() {
        return $this->belongsTo(Station::class, 'destination_id');
    }

    public function scheduleClasses() {
        return $this->hasMany(ScheduleClass::class);
    }

}
