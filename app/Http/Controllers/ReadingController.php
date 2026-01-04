<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reading;
use App\Models\Meter;

class ReadingController extends Controller
{
    public function store(Request $request, Skaititajs $skaititajs)
    {
        $request->validate([
            'value' => 'required|numeric|min:0',
        ]);

        $skaititajs->readings()->create([
            'value' => $request->value,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Rādījums nosūtīts!');
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
