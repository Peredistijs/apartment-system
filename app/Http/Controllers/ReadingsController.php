<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadingsController extends Controller
{
    public function home()
    {
        return view('Readings');
    }
}
