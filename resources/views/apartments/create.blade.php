@extends('layouts.layout')
@section('title', 'Pievienot dzīvokli')
@section('content')
<div style="text-align:center;">
    <h1>Pievienot dzīvokli</h1>

    <form method="POST" action="/apartments" style="background:#ffffff; padding:40px; width:400px; margin:30px auto; border:1px solid #000;">
        @csrf
        <div style="margin-bottom:15px; text-align:left;">
            <label>Adrese</label>
            <input type="text" name="address" style="width:100%; padding:8px;" required>
        </div>

        <div style="margin-bottom:25px; text-align:left;">
            <label>Dzīvokļa numurs</label>
            <input type="text" name="apartment_number" style="width:100%; padding:8px;" required>
        </div>

        <button type="submit" style="padding:12px 35px; border:1px solid #000; background:#ffffff; cursor:pointer;">
            Saglabāt
        </button>
    </form>
</div>
@endsection