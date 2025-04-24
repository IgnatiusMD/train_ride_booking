<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainClass;

class TrainClassController extends Controller
{
    public function index() {
        $classes = TrainClass::all();
        return view('classes.index', compact('classes'));
    }

    public function store(Request $request) {
        TrainClass::create($request->validate(['name' => 'required|string']));
        return back();
    }
}
