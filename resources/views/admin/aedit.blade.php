@extends('layouts.layout')

@section('title', 'Admin — Rediģēt dzīvokli')

@section('content')
<div style="text-align:center; margin-top:60px;">

    <h2>Rediģēt dzīvokli ADMIN</h2>

    <form method="POST" action="/admin/apartments/{{ $apartment->id }}" 
          style="background:#fff; padding:40px; width:400px; margin:30px auto; border:1px solid #000;">
        @csrf
        @method('PUT')

        <div style="margin-bottom:15px; text-align:left;">
            <label>Adrese</label>
            <input type="text" name="address" value="{{ $apartment->address }}" style="width:100%; padding:8px;" required>
        </div>

        <div style="margin-bottom:25px; text-align:left;">
            <label>Dzīvokļa numurs</label>
            <input type="text" name="apartment_number" value="{{ $apartment->apartment_number }}" style="width:100%; padding:8px;" required>
        </div>

        <button type="submit" style="padding:12px 35px; border:1px solid #000; background:#fff; cursor:pointer;">
            Saglabāt
        </button>
    </form>

</div>
@endsection
