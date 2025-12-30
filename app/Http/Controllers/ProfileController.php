<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function home()
    {
        return view('/profile');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'personal_code' => 'nullable|string|size:12|unique:users,personal_code,' . auth()->id(),
        ]);

        $user = auth()->user();
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->personal_code = $request->personal_code;
        $user->save();

        return back()->with('success', 'Profils atjaunināts'); // have to add this to profile blade
    }

    public function delete(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = auth()->user();

        if (! Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Nepareiza parole',
            ]);
        }

        auth()->logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Konts dzēsts');
    }
}
