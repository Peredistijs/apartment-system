<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body style="background-color:#e6f2ff;">

<!-- top menu -->
<nav style="display:flex; justify-content:space-between; padding:15px;">
    <div>
        <h1>DPS</h1>
    </div>

    <div style="display:flex; gap:20px;">
        <a href="#">Ziņas</a>
        <a href="#">Profils</a>

        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Iziet</button>
        </form>
    </div>
</nav>

<!-- galvenaa -->
<main style="text-align:center; margin-top:60px;">

    <h1 style="font-size:150px;">DPS</h1>

    <div style="margin-top:40px; display:flex; flex-direction:column; align-items:center; gap:30px;">
        <a href="#" style="padding:30px 200px; border:1px solid #000; background-color: #ffffff">
            Dzīvoklis
        </a>

        <a href="#" style="padding:30px 200px; border:1px solid #000; background-color: #ffffff">
            Rādījumi
        </a>
    </div>

</main>

</body>
</html>
