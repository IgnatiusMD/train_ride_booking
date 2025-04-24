<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Train;

class TrainController extends Controller
{
    public function index() {
        $trains = Train::all();
        return view('trains.index', compact('trains'));
    }

    public function create() {
        return view('trains.create');
    }

    public function store(Request $request) {
        Train::create($request->all());
        return redirect()->route('trains.index');
    }

    public function edit(Train $train) {
        return view('trains.edit', compact('train'));
    }

    public function update(Request $request, Train $train) {
        $train->update($request->all());
        return redirect()->route('trains.index');
    }

    public function destroy(Train $train) {
        $train->delete();
        return redirect()->route('trains.index');
    }

}
