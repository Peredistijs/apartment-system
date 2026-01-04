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

            @if($apartment->meter->count() > 0)
            <h4>Skaitītāji:</h4>
            <ul>
                @foreach($apartment->meter as $meter)
                    <li style="list-style:none; padding:12px 0; ">

                        <div style="margin-bottom:6px;">
                            <strong>Tips:</strong> {{ $meter->type_lv }}
                        </div>

                        <div style="margin-bottom:6px;">
                            <strong>Uzstādīts:</strong> {{ $meter->setup_date }}
                        </div>

                        <div style="margin-bottom:10px;">
                            <strong>Sākuma rādījums:</strong> {{ $meter->starting_reading }}
                        </div>

                        <div style="display:flex; gap:12px; align-items:center;">
                            <a href="/meters/{{ $meter->id }}/readings" style="padding:6px 14px; border:1px solid #000; text-decoration:none;">
                                Rādījumi
                            </a>

                            <form action="/meters/{{ $meter->id }}" method="POST" style="margin:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Vai tiešām vēlaties dzēst skaitītāju?')" style="padding:6px 14px; border:1px solid red; background:#fff; color:red; cursor:pointer;">
                                    Dzēst
                                </button>
                            </form>
                        </div>
                        <hr style="margin-top:16px; border:0; border-top:1px solid #000;">

                    </li>
@endforeach
            </ul>
            @else
                <p style="color:red;">Nav pievienots neviens skaitītājs</p>
            @endif

            <br><br>

            @if ($apartment->owner_id === auth()->id()) 
                <a href="/apartments/{{ $apartment->id }}/edit" style="display:inline-block; padding:10px 20px; border:1px solid #000; background:#ffffff; text-decoration:none; margin-top:10px; cursor:pointer;">
                    Rediģēt
                </a>

                <a href="/apartments/{{ $apartment->id }}/meter/add" style="display:inline-block; padding:10px 20px; border:1px solid #000; background:#ffffff; text-decoration:none; margin-top:10px; cursor:pointer;">
                    Skaitītājs
                </a>

            @endif
        </div>
    @endforeach
</div>

@endsection