@extends('layouts.layout')

@section('title', 'Rādījumi')

@section('content')
<div style="text-align:center; margin-top:60px;">
    <h2>Iesniegt rādījumu</h2>

    <div style="background:#ffffff; border:1px solid #000; padding:30px; width:400px; margin:30px auto; text-align:left;">
            <form method="POST" action="/readings/store">
                @csrf

                <div style="margin-bottom:20px; text-align:left;">
                    <label>Izvēlies skaitītāju</label>
                    <select name="meter_id" style="width:100%; padding:8px;" required>
                        @foreach($meters as $meter)
                            <option value="{{ $meter->id }}">
                                {{ $meter->apartment->address }}, Dz. {{ $meter->apartment->apartment_number }} — {{ $meter->type_lv }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom:20px; text-align:left;">
                    <label>Rādījums</label>
                    <input type="number" step="0.01" name="value" style="width:100%; padding:8px;" required>
                </div>

                <button type="submit" style="padding:12px 35px; border:1px solid #000; background:#fff; cursor:pointer;">
                    Iesniegt rādījumu
                </button>
            </form>
        </div>
</div>


@endsection