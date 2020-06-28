<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <p>Cliente: <?=$item['apellido']?>, &nbsp; <?=$item['nombre']?></p><br>
    <p>Profesional: <?=$item['pr_apellido']?>, &nbsp; <?=$item['pr_nombre']?></p><br>
    <p>Fecha de turno: <?=$item['fecha_string']?></p><br>
    <p>Estado de pago de la sesion: <?=$item['payment_status']?></p>
    <p>El siguiente id lo necesitará para conectarse el dia del turno con el profesional por videollamada</p><br>
    <p>Id de la videollamada: <?=$item['id_sesion']?></p>

</body>
</html>