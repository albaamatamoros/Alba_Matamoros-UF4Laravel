<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restabliment de contrasenya</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 0; background-color: #f9f9f9; color: #333;">
    <div style="max-width: 600px; margin: 20px auto; background: #ffffff; border: 1px solid #ddd; border-radius: 8px; padding: 20px;">
        <h2 style="color: #444; text-align: center;">Restabliment de la contrasenya</h2>
        <p>Benvolgut/da,</p>
        <p>Hem rebut una sol·licitud per restablir la contrasenya del teu compte. Si us plau, fes clic al botó següent per a restablir-la:</p>
        <div style="text-align: center; margin: 20px 0;">
            <a href="{{ $resetUrl }}" style="background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-size: 16px;">Restablir contrasenya</a>
        </div>
        <p>O també pots copiar i enganxar aquest enllaç al teu navegador:</p>
        <p><a href="{{ $resetUrl }}" style="color: #007bff;">{{ $resetUrl }}</a></p>
        <hr style="border: none; border-top: 1px solid #eee; margin: 20px 0;">
        <p style="font-size: 12px; color: #999;">Si no has sol·licitat aquest canvi, ignora aquest correu electrònic. Per a qualsevol dubte o incidència, contacta amb nosaltres.</p>
        <p style="text-align: center; font-size: 12px; color: #bbb;">L'equip d'Alba Matamoros</p>
    </div>
</body>
</html>
