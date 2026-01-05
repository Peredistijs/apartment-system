<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //USERS EDIT, DELETE, STORE
    
    public function uhome()
    {
        if (auth()->user()->role !== 'admin') { //can probably replace with __contrust method for cleaner code
            abort(403);
        }

        $users = User::all();
        return view('admin.uhome', compact('users'));
    }

    public function udelete(User $user)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $user->delete();
        return back()->with('success', 'Lietotājs dzēsts');
    }

    public function editUser(User $user)
    {
        return view('admin.uedit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'personal_code' => 'nullable|string|size:12|unique:users,personal_code,' . $user->id,
            'role' => 'required|in:owner,resident,admin', // allow admin to change role
        ]);

        $user->update([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'personal_code' => $request->personal_code,
            'role' => $request->role,
        ]);

        return redirect('/admin/users')->with('success', 'Profils atjaunināts!');
    }

    //APARTMENTS EDIT, DELETE, STORE

    public function ahome()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $apartments = Apartment::with(['owner', 'resident', 'meter'])->get();

        return view('admin.ahome', compact('apartments'));
    }

    public function adelete(Apartment $apartment)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $apartment->delete();

        return back()->with('success', 'Dzīvoklis dzēsts');
    }

    public function editApartment(Apartment $apartment)
    {
        return view('admin.aedit', compact('apartment'));
    }

    public function updateApartment(Request $request, Apartment $apartment)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'apartment_number' => 'required|string|max:20',
        ]);

        $apartment->update([
            'address' => $request->address,
            'apartment_number' => $request->apartment_number,
        ]);

        return redirect('/admin/apartments')->with('success', 'Dzīvoklis atjaunināts!');
    }
}
