<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h3>Turnos agendados</h3>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Teléfono</th>               
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Estado</th>
                <th scope="col">Videollamada</th>
                </tr>
            </thead>
            <tbody>
        <?php
        if(isset($turnos)){
            if($turnos == 0){
                echo "Aun no se han registrado turnos con este profesional";
            }else{
                
                foreach($turnos as $item){
                ?>
            
                    <tr>
                    <th scope="row">1</th>
                    <td><?=$item['nombre']?></td>
                    <td><?=$item['apellido']?></td>
                    <td><?=$item['email']?></td>
                    <td><?=$item['telefono']?></td>
                    <td><?=$item['start']?></td>
                    <td><?=$item['hora']?></td>
                    <td><?=$item['payment_status']?></td>
                    <!-- $route['profesional/videollamada/(:any)'] = 'Profesional/goVideoCall/$1'; -->
                    <td><a href="<?=base_url('profesional/videollamada/').$item['idt'].$item['token_id']?>"><i class="fa fa-video"></i></a></td>
                    </tr>

        <?php   }
            }
        }?>
            </tbody>
        </table>
    </div>
</body>
</html>
