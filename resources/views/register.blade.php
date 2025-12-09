<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>

<div class="container">
    <form class="form" method="POST">
        
        <h2>DPS</h2>

        <div class="input">
            <label>E-pasts</label>
            <input type="email" name="email" required>
        </div>

        <div class="input">
            <label>Parole</label>
            <input type="password" name="password" required>
        </div>

        <div class="input">
            <label>Veids</label>
            <select name="role" required>
                <option value="iretajs">Īrētājs</option>
                <option value="iziretajs">Izīrētājs</option>
            </select>
        </div>

        <button type="submit" class="button">Registreties</button>

        <p class="login-link">
            Jau ir konts? <a href="http://dzivoklu-sistema.test/">Ieiet</a>
        </p>
    </form>
</div>

</body>
</html>