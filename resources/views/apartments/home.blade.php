@extends('layouts.layout')
@section('title', 'Dzīvokļi')
@section('content')
<div style="text-align:center; margin-top:60px; display:flex; flex-direction:column; align-items:center; gap:30px;">
    <h2>Dzīvoklis</h2>

    <a href="/apartments/list" style="padding:30px 200px; border:1px solid #000; background:#ffffff; text-decoration:none;">
        Pārbaudīt dzīvokļus
    </a>

    <a href="/apartments/create" style="padding:30px 200px; border:1px solid #000; background:#ffffff; text-decoration:none;">
        Pievienot dzīvokli
    </a>
</div>
@endsection