<?php

namespace App\Http\Controllers;
use App\Models\Apartment;
use App\Models\Meter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MeterController extends Controller
{
    public function create(Apartment $apartment) //dont need this for now in current design
    {
        if ($apartment->owner_id !== auth()->id()) {
            return redirect('/apartments')->withErrors('Nav atļauts'); //only apart owner can see create view
        }

        $meters = $apartment->meter;

        return view('meter.create', compact('apartment', 'meters'));
    }

    public function store(Request $request, Apartment $apartment)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'setup_date' => 'required|date',
            'starting_reading' => 'required|numeric|min:0',
        ]);

        $apartment->meter()->create($request->all());

        return redirect('/apartments/list')->with('success', 'Skaitītājs pievienots!');
    }

    public function add(Apartment $apartment)
    {
        if ($apartment->owner_id !== auth()->id()) {
            return redirect('/apartments')->withErrors('Nav atļauts'); //only apart owner can add a meter
        }

        return view('meter.add', compact('apartment'));
    }

    public function delete(Meter $meter)
    {
    if ($meter->apartment->owner_id !== auth()->id()) {
        return redirect()->back()->withErrors('Nav atļauts'); // only apart owner can delete his apart meter
    }

    $meter->delete();
    return redirect()->back()->with('success', 'Skaitītājs dzēsts!');
}

}
