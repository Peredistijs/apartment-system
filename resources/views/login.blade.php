<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body style="background-color:#e6f2ff; margin:0; font-family:Arial, sans-serif;">

<div style="text-align:center; margin-top:60px;">

    <form method="POST" action="/login" style="background:#ffffff; padding:40px; width:400px; margin:0 auto; border:2px solid #000;">
        @csrf
        <h2 style="margin-bottom:30px;">DZĪVOKĻU PĀRVALDĪBAS SISTĒMA</h2>

        <div style="margin-bottom:15px; text-align:left;">
            <label>E-pasts</label>
            <input type="email" name="email" required style="width:100%; padding:8px;">
        </div>

        <div style="margin-bottom:25px; text-align:left;">
            <label>Parole</label>
            <input type="password" name="password" required style="width:100%; padding:8px;">
        </div>

        <button type="submit" style="padding:12px 35px; border:1px solid #000; background:#ffffff; cursor:pointer;">
            Ieiet
        </button>

        <p style="margin-top:20px;">
            <a href="/register">Registreties</a>
        </p>
    </form>

</div>

</body>
</html>
