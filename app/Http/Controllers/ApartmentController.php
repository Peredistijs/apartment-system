<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ApartmentController extends Controller
{
    public function home()
    {
        return view('apartments.home');
    }

    public function create()
    {
        return view('Apartments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'apartment_number' => 'required|string|max:20',
        ]);

        $apartment = Apartment::create([
            'address' => $request->address,
            'apartment_number' => $request->apartment_number,
            'owner_id' => Auth::id(),
        ]);

        $user = Auth::user();
        if ($user->role !== 'owner') {
            $user->role = 'owner';
            $user->save();
        }

        return redirect('/apartments/list')->with('success', 'Dzīvoklis pievienots!');
    }

    public function list()
    {
        $apartments = Apartment::where('owner_id', Auth::id())
        ->orWhere('resident_id', Auth::id())
        ->get();

        return view('apartments.list', compact('apartments'));
    }

     public function edit(Apartment $apartment)
    {
        
        if ($apartment->owner_id !== Auth::id()) {
            return redirect('/apartments')->withErrors('Nav atļauts');
        }

        $users = User::where('role', 'resident')->get();
        return view('apartments.edit', compact('apartment', 'users'));
    }

    public function update(Request $request, Apartment $apartment)
    {
        if ($apartment->owner_id !== Auth::id()) {
            return redirect('/apartments')->withErrors('Nav atļauts');
        }

        $request->validate([
            'address' => 'required|string|max:255',
            'apartment_number' => 'required|string|max:20',
        ]);

        $apartment->update([
            'address' => $request->address,
            'apartment_number' => $request->apartment_number,
        ]);

        return back()->with('success', 'Dzīvokļa dati atjaunināti!');
    }

    public function delete(Apartment $apartment)
    {
        if ($apartment->owner_id !== Auth::id()) {
            return redirect('/apartments')->withErrors('Nav atļauts');
        }

        $apartment->delete();
        return redirect('/apartments/list')->with('success', 'Dzīvoklis dzēsts!');
    }

    public function assignResident(Request $request, Apartment $apartment)
    {
        if ($apartment->owner_id !== Auth::id()) {
            return redirect('/apartments')->withErrors('Nav atļauts');
        }

        $request->validate([
        'personal_code' => 'required|string|size:12',
        ]);

        $resident = User::where('personal_code', $request->personal_code)->first();

        $apartment->resident_id = $resident->id;
        $apartment->save();

        return back()->with('success', 'Īrnieks pievienots');
    }

     public function removeResident(Apartment $apartment)
    {
        if ($apartment->owner_id !== Auth::id()) {
            return redirect('/apartments')->withErrors('Nav atļauts');
        }

        $apartment->resident_id = null;
        $apartment->save();

        return back()->with('success', 'Īrnieks noņemts!');
    }
}
