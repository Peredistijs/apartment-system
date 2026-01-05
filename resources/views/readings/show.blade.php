@extends('layouts.layout')

@section('title', 'Iesniegtie rādījumi')

@section('content')
<div style="text-align:center; margin-top:60px;">
    <h2>Rādījumi — {{ $meter->type_lv }} ({{ $meter->apartment->address }}, Dz. {{ $meter->apartment->apartment_number }})</h2>

        @foreach($readings as $reading)
            <div style="background:#ffffff; border:1px solid #000; padding:20px; width:400px; margin:20px auto; text-align:left;">
                <div style="margin-bottom:8px;">
                    <strong>Rādījums:</strong> {{ $reading->value }}
                </div>
                <div style="margin-bottom:8px;">
                    <strong>Iesniedzis:</strong> {{ $reading->user->first_name }} {{ $reading->user->last_name }}
                </div>
                <div style="margin-bottom:12px;">
                    <strong>Statuss:</strong> {{ $reading->status_lv }}
                </div>

                <form method="POST" action="/readings/{{ $reading->id }}/status" style="display:flex; gap:10px; align-items:center;">
                    @csrf
                    @method('PUT')
                    <select name="status" style="padding:6px 10px;">
                        <option value="approved" @if($reading->status=='approved') selected @endif>Apstiprināt</option>
                        <option value="rejected" @if($reading->status=='rejected') selected @endif>Noraidīt</option>
                    </select>
                    <button type="submit" style="padding:6px 14px; border:1px solid #000; background:#fff; cursor:pointer;">Saglabāt</button>
                </form>
            </div>

            
        @endforeach
        <a href="/apartments/{{ $meter->apartment->id }}/readings/export" style="padding:6px 14px; border:1px solid #000; text-decoration:none; margin-left:10px;">
                Eksportēt rādījumus
        </a>

</div>
@endsection