<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\TrainClass;
use App\Models\ScheduleClass;

class ScheduleClassController extends Controller
{
    public function create($schedule_id) {
        $schedule = Schedule::findOrFail($schedule_id);
        $classes = TrainClass::all();
        return view('schedule_classes.create', compact('schedule', 'classes'));
    }

    public function store(Request $request) {
        ScheduleClass::create([
            'schedule_id' => $request->schedule_id,
            'train_class_id' => $request->train_class_id,
            'price' => $request->price,
        ]);

        return redirect()->route('schedules.index');
    }
}
