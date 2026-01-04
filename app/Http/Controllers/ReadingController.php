<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reading;
use App\Models\Meter;
use App\Models\Apartment;

class ReadingController extends Controller
{
    public function home()
    {
        $apartments = Apartment::where('resident_id', auth()->id())->get();

        if($apartments->isEmpty()) {
            return view('readings.no_apartment'); //not assgined view
        }

        //collect all meters assigned to this resident
        $meters = $apartments->flatMap(fn($apt) => $apt->meter);

        return view('readings.home', compact('meters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'meter_id' => 'required|exists:meter,id',
            'value' => 'required|numeric|min:0',
        ]);

        $reading = Reading::create([
            'meter_id' => $request->meter_id,
            'user_id' => auth()->id(),
            'value' => $request->value,
        ]);

        return redirect()->back()->with('success', 'Rādījums nosūtīts!');
    }

     public function show(Meter $meter)
    {
        if($meter->apartment->owner_id !== auth()->id()) {
            return redirect('/apartments')->withErrors('Nav atļauts');
        }

        $readings = $meter->readings()->latest()->get();

        return view('readings.show', compact('meter', 'readings'));
    }

    public function updateStatus(Request $request, Reading $reading)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $reading->status = $request->status;
        $reading->save();

        return redirect()->back()->with('success', 'Rādījuma statuss atjaunināts!');
    }
}
