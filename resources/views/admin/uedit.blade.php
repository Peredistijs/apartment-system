@extends('layouts.layout')

@section('title', 'Rediģēt lietotāju')

@section('content')
<div style="text-align:center;">

    <h2>Rediģēt lietotāju</h2>

    <form method="POST" action="/admin/users/{{ $user->id }}"
          style="background:#fff; padding:40px; width:400px; margin:30px auto; border:1px solid #000;">
        @csrf
        @method('PUT')

        <div style="margin-bottom:15px; text-align:left;">
            <label>Vārds</label>
            <input type="text" name="first_name" value="{{ $user->first_name }}" style="width:100%; padding:8px;">
        </div>

        <div style="margin-bottom:15px; text-align:left;">
            <label>Uzvārds</label>
            <input type="text" name="last_name" value="{{ $user->last_name }}" style="width:100%; padding:8px;">
        </div>

        <div style="margin-bottom:15px; text-align:left;">
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}" required style="width:100%; padding:8px;">
        </div>

        <div style="margin-bottom:15px; text-align:left;">
            <label>Personas kods</label>
            <input type="text" name="personal_code" value="{{ $user->personal_code }}" style="width:100%; padding:8px;">
        </div>

        <div style="margin-bottom:25px; text-align:left;">
            <label>Loma</label>
            <select name="role" style="width:100%; padding:8px;">
                <option value="resident" @selected($user->role === 'resident')>Resident</option>
                <option value="owner" @selected($user->role === 'owner')>Owner</option>
                <option value="admin" @selected($user->role === 'admin')>Admin</option>
            </select>
        </div>

        <button type="submit"
            style="padding:12px 35px; border:1px solid #000; background:#fff; cursor:pointer;">
            Saglabāt
        </button>
    </form>
</div>
@endsection
