<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\ScheduleClass;

class BookingController extends Controller
{
    public function index() {
        $bookings = Booking::with('user', 'scheduleClass.schedule')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function store(Request $request) {
        $scheduleClass = ScheduleClass::findOrFail($request->schedule_class_id);
        $totalPrice = $scheduleClass->price * $request->seats_booked;

        Booking::create([
            'user_id' => auth()->id(),
            'schedule_class_id' => $request->schedule_class_id,
            'seats_booked' => $request->seats_booked,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.index');
    }
}
