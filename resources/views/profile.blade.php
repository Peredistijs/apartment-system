@extends('layouts.layout')

@section('title', 'Profils')

@section('content')
<div style="text-align:center;">

    <h2>Profils</h2>

    <!-- Update profile -->

    <form method="POST" action="/profile" style="background:#ffffff; padding:40px; width:400px; margin:30px auto; border:1px solid #000;">
        @csrf
        @method('PUT')

        <div style="margin-bottom:15px; text-align:left;">
            <label>Vārds</label>
            <input type="text" name="first_name" value="{{ auth()->user()->first_name }}" style="width:100%; padding:8px;" required>
        </div>

        <div style="margin-bottom:15px; text-align:left;">
            <label>Uzvārds</label>
            <input type="text" name="last_name" value="{{ auth()->user()->last_name }}" style="width:100%; padding:8px;" required>
        </div>

        <div style="margin-bottom:15px; text-align:left;">
            <label>Personas kods</label>
            <input type="text" name="personal_code" value="{{ auth()->user()->personal_code }}" style="width:100%; padding:8px;" required>
        </div>

        <div style="margin-bottom:25px; text-align:left;">
            <label>E-pasts</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" style="width:100%; padding:8px;" required>
        </div>

        <button type="submit" style="padding:12px 35px; border:1px solid #000; background:#ffffff; cursor:pointer;">
            Saglabāt
        </button>
    </form>

    <h2>Profila dzēšana</h2>

    <!-- deleete -->
    <form method="POST" action="/profile" style="background:#ffffff; padding:40px; width:400px; margin:0 auto; border:1px solid #000;">
        @csrf
        @method('DELETE')

        <div style="margin-bottom:20px; text-align:left;">
            <label>Parole (apstiprināšanai)</label>
            <input type="password" name="password" style="width:100%; padding:8px;" required>
        </div>

        <button type="submit" style="padding:12px 35px; border:1px solid red; background:#ffffff; color:red; cursor:pointer;">
            Dzēst kontu
        </button>
    </form>

</div>
@endsection
