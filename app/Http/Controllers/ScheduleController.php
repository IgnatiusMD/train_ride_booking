<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Train;
use App\Models\Station;

class ScheduleController extends Controller
{
    public function index() {
        $schedules = Schedule::with(['train', 'originStation', 'destinationStation'])->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create() {
        $trains = Train::all();
        $stations = Station::all();
        return view('schedules.create', compact('trains', 'stations'));
    }

    public function store(Request $request) {
        Schedule::create($request->all());
        return redirect()->route('schedules.index');
    }
}
