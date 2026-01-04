@extends('layouts.layout')
@section('title', 'Skaitītāji')

@section('content')
<h2>Skaitītāji — {{ $apartment->address }}, Dz. {{ $apartment->apartment_number }}</h2>

<a href="/apartments/{{ $apartment->id }}/meter/add"
   style="display:inline-block; padding:10px 20px; border:1px solid #000; background:#ffffff; text-decoration:none; margin-bottom:20px; cursor:pointer;">
    Pievienot skaitītāju
</a>

@foreach ($meters as $meter)
    <div style="border:1px solid #000; padding:15px; margin-bottom:15px;">
        <strong>Tips:</strong> {{ $meter->type }} <br>
        <strong>Uzstādīts:</strong> {{ $meter->setup_date }} <br>
        <strong>Sākuma rādījums:</strong> {{ $meter->starting_reading }}

        <br><br>

        <a href="/meters/{{ $meter->id }}/readings"
           style="padding:6px 14px; border:1px solid #000; text-decoration:none;">
            Rādījumi
        </a>
    </div>
@endforeach
@endsection