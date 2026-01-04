@extends('layouts.layout')
@section('title', 'Pievienot skaitītāju')

@section('content')
<h2 style="text-align:center; margin-top:60px;">Pievienot skaitītāju — {{ $apartment->address }}, Dz. {{ $apartment->apartment_number }}</h2>

<form method="POST" action="/apartments/{{ $apartment->id }}/meter" 
      style="background:#fff; padding:40px; width:400px; margin:30px auto; border:1px solid #000;">
    @csrf

    <div style="margin-bottom:15px; text-align:left;">
        <label>Tips</label>
        <select name="type" style="width:100%; padding:8px;" required>
            <option value="">Izvēlieties skaitītāja tipu</option>
            <option value="Electric">Elektrība</option>
            <option value="Water">Ūdens</option>
            <option value="Gas">Gāze</option>
        </select>
    </div>

    <div style="margin-bottom:15px; text-align:left;">
        <label>Uzstādīts</label>
        <input type="date" name="setup_date" style="width:100%; padding:8px;" required>
    </div>

    <div style="margin-bottom:25px; text-align:left;">
        <label>Sākuma rādījums</label>
        <input type="number" step="0.01" max="99999999.99" name="starting_reading" style="width:100%; padding:8px;" required>
    </div>

    <button type="submit" style="padding:12px 35px; border:1px solid #000; background:#fff; cursor:pointer;">
        Pievienot skaitītāju
    </button>
</form>
@endsection
