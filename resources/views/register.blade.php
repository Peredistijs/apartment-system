<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>

<div class="container">
    <form class="form" method="POST" action="/register">
        @csrf
        <h2>DZĪVOKĻU PĀRVALDĪBAS SISTĒMA</h2>

        <div class="input">
            <label>E-pasts</label>
            <input type="email" name="email" required>
        </div>

        <div class="input">
            <label>Parole</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" class="button">Registreties</button>

        <p class="login-link">
            Jau ir konts? <a href="http://dzivoklu-sistema.test/">Ieiet</a>
        </p>
    </form>
</div>

</body>
</html>