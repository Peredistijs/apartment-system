<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'DPS')</title>
</head>
<body style="background-color:#e4f0f4; margin:0; font-family:Arial, sans-serif;">

<!-- top menu -->
<nav style="display:flex; justify-content:space-between; padding:15px;">
    <div>
        <a href="/home" style="text-decoration:none; color:inherit;" >
            <h1>DPS</h1>
        </a>
    </div>

    <div style="display:flex; gap:20px; align-items:center;">
        <a href="#" style="text-decoration:none; color:inherit;">Ziņas</a>
        <a href="/profile" style="text-decoration:none; color:inherit;">Profils</a>

        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Iziet</button>
        </form>
    </div>
</nav>

<!-- main -->
<main style="margin-top:60px;">
    @yield('content')
</main>

</body>
</html>