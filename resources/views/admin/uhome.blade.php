@extends('layouts.layout')

@section('title', 'Admin — Lietotāji')

@section('content')
<div style="text-align:center; margin-top:60px;">
    <h2>Visi lietotāji ADMIN</h2>

    @foreach($users as $user)
        @if($user->id === auth()->id())
            @continue
        @endif

        <div style="background:#ffffff; border:1px solid #000; padding:30px; width:400px; margin:30px auto; text-align:left;">

            <strong>
                {{ $user->first_name ?? '—' }} {{ $user->last_name ?? '' }}
            </strong>

            <p><strong>E-pasts:</strong> {{ $user->email }}</p>
            <p><strong>Personas kods:</strong> {{ $user->personal_code ?? '—' }}</p>
            <p><strong>Loma:</strong> {{ $user->role_lv }}</p>

            <div style="display:flex; gap:12px; align-items:center; margin-top:10px;">
                <a href="/admin/users/{{ $user->id }}/edit"
                   style="display:inline-block; padding:10px 20px; border:1px solid #000; background:#ffffff; text-decoration:none;">
                    Rediģēt
                </a>

                <form method="POST" action="/admin/users/{{ $user->id }}" style="margin:0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Vai tiešām dzēst šo lietotāju?')"
                        style="padding:6px 14px; border:1px solid red; background:#fff; color:red;">
                        Dzēst
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection