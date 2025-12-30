<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Profils</title>
</head>
<body style="background-color:#e6f2ff;">

<h2>Profils</h2>


<form method="POST" action="/profile">
    @csrf
    @method('PUT')

    <div>
        <label>Vārds</label>
        <input type="text" name="first_name" value="{{ auth()->user()->first_name }}">
    </div>

    <div>
        <label>Uzvārds</label>
        <input type="text" name="last_name" value="{{ auth()->user()->last_name}}">
    </div>

    <div>
        <label>Personas kods</label>
        <input type="text" name="personal_code" value="{{ auth()->user()->personal_code}}">
    </div>

    <div>
        <label>E-pasts</label>
        <input type="email" name="email" value="{{ auth()->user()->email }}" required>
    </div>

    <button type="submit">Saglabāt</button>
    
</form>

<hr>


<form method="POST" action="/profile">
    @csrf
    @method('DELETE')

    <div>
        <label>Parole (apstiprināšanai)</label>
        <input type="password" name="password" required>
    </div>

    <button type="submit" style="color:red;">
        Dzēst kontu
    </button>
</form>

</body>
</html>
