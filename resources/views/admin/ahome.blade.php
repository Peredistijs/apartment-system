@extends('layouts.layout')

@section('title', 'Admin — Dzīvokļi')

@section('content')
<div style="text-align:center; margin-top:60px;">
    <h2>Visi dzīvokļi ADMIN</h2>

    @foreach($apartments as $apartment)
        <div style="background:#ffffff; border:1px solid #000; padding:30px; width:400px; margin:30px auto; text-align:left;">

            <strong>
                {{ $apartment->address }}, Dz. {{ $apartment->apartment_number }}
            </strong>

            <p>
                <strong>Īpašnieks:</strong>
                {{ $apartment->owner->first_name ?? '—' }}
                {{ $apartment->owner->last_name ?? '' }}
            </p>

            <p>
                <strong>Iedzīvotājs:</strong>
                {{ $apartment->resident->first_name ?? '—' }}
                {{ $apartment->resident->last_name ?? '' }}
            </p>

            <p>
                <strong>Skaitītāji:</strong> {{ $apartment->meter->count() }}
            </p>

            <div style="display:flex; gap:12px; align-items:center; margin-top:10px;">
                <a href="/admin/apartments/{{ $apartment->id }}/edit" 
                   style="display:inline-block; padding:10px 20px; border:1px solid #000; background:#ffffff; text-decoration:none; cursor:pointer;">
                    Rediģēt
                </a>

                <form method="POST" action="/admin/apartments/{{ $apartment->id }}" style="margin:0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Vai tiešām dzēst šo dzīvokli?')"
                        style="padding:6px 14px; border:1px solid red; background:#fff; color:red; cursor:pointer;">
                        Dzēst
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection