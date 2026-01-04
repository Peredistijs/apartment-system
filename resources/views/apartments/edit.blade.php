@extends('layouts.layout')

@section('title', 'Edit')

@section('content')
<div style="text-align:center;">

    <h2>Rediģēt dzīvokli</h2>

    <form method="POST" action="/apartments/{{ $apartment->id }}" style="background:#fff; padding:40px; width:400px; margin:30px auto; border:1px solid #000;">
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

    <!-- Assign resident -->
    <form method="POST" action="/apartments/{{ $apartment->id }}/assign-resident" style="background:#fff; padding:30px; width:400px; margin:30px auto; border:1px solid #000;">
    @csrf
    @method('PUT')
    <div style="margin-bottom:15px; text-align:left;">
        <label>Pievienot īrnieku</label>
        <select name="personal_code" style="width:100%; padding:8px;">
            <option value="">Īrnieks</option>
            @foreach($users as $user)
                <option value="{{ $user->personal_code }}" @if($apartment->resident_id == $user->id) selected @endif>
                    {{ $user->first_name }} {{ $user->last_name }} ({{ $user->personal_code }}) {{ $user->email }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" style="padding:12px 35px; border:1px solid #000; background:#fff; cursor:pointer;">
        Pievienot
    </button>

    </form>

    <!-- Remove resident -->
    @if($apartment->resident_id)
    <form method="POST" action="/apartments/{{ $apartment->id }}/remove-resident" style="background:#fff; padding:30px; width:400px; margin:30px auto; border:1px solid red;">
        @csrf
        @method('PUT')
        <button type="submit" onclick="return confirm('Vai tiešām vēlaties atvienot īrnieku?')" style="padding:12px 35px; border:1px solid red; background:#fff; color:red; cursor:pointer;">
            Noņemt īrnieku
        </button>
    </form>
    @endif

    <!-- Delette apartment -->
    <form method="POST" action="/apartments/{{ $apartment->id }}" style="background:#fff; padding:30px; width:400px; margin:30px auto; border:1px solid red;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Vai tiešām vēlaties dzēst dzīvokli?')" style="padding:12px 35px; border:1px solid red; background:#fff; color:red; cursor:pointer;">
            Izdzēst dzīvokli
        </button>
    </form>

</div>
@endsection
