@extends('layouts.layout')

@section('title', 'Home')

@section('content')
<div style="text-align:center;">

    <h1 style="font-size:40px;">Dzīvokļu pārvaldības sistēma</h1>

    <div style="margin-top:100px; display:flex; flex-direction:column; align-items:center; gap:30px;">
        <a href="/apartments" style="padding:20px 200px; border:1px solid #000; background-color: #ffffff">
            Dzīvoklis
        </a>

        <a href="/readings" style="padding:20px 200px; border:1px solid #000; background-color: #ffffff">
            Rādījumi
        </a>
    </div>

</div>

@endsection