@extends('layouts.layout')
@section('title', 'Mani dzīvokļi')
@section('content')

<div style="text-align:center; margin-top:60px;">
    <h2>Mani dzīvokļi</h2>

    @foreach ($apartments as $apartment)
        <div style="background:#ffffff; border:1px solid #000; padding:30px; width:400px; margin:30px auto; text-align:left;">
            <strong>
                {{ $apartment->address }}, Dz. {{ $apartment->apartment_number }}
            </strong>
            <br><br>

            
            @if ($apartment->owner_id === auth()->id()) 
                <a href="/apartments/{{ $apartment->id }}/edit"
                   style="display:inline-block; padding:10px 20px; border:1px solid #000; background:#ffffff; text-decoration:none; margin-top:10px; cursor:pointer;">
                    Rediģēt
                </a>
            @endif
        </div>
    @endforeach
</div>

@endsection