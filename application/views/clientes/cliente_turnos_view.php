<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            
            border: 1px solid;
        }
        table {
            
        }

        table > thead {
            color: black;
            background: #4E94AE;
        }
        h1 {
            margin-top: 20px;
        }

        @media screen and (max-width: 600px) {
            table {
                width:100%;                
            }
            /*
            tr:nth-of-type(2n) {
                background-color: inherit;
            }
            tr td:first-child {
                background: #f0f0f0;
                font-weight:bold;
                font-size:1.3em;
            }
            tbody td {
                display: block;
                text-align:center;
            }
            tbody td:before {
                content: attr(data-th);
                display: block;
                text-align:center;
            }
            */
        }

    </style>
</head>
<body>
    <section>
    <div class="container">

        <H1>MIS TURNOS</H1>

        
        <table class="table table-responsive">
            <thead>
                <tr>                        
                    <th scope="col">Profesional</th>
                    <th scope="col">Fecha del turno</th>
                    <th scope="col">Id Videollamada</th>
                    <th scope="col">Estado del pago del turno</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                if(!empty($turnos)){ 
                    $idF = 1;
                    foreach($turnos as $item){                        
                        echo "<td>".$item['pr_nombre']."".$item['pr_apellido']."</td>";
                        echo "<td>".$item['fecha_string']."</td>";
                        echo "<td><a href=''>".$item['id_sesion']."</td></a>";
                        echo "<td>".$item['payment_status']."</td>";?>
                        <input type="text" class="id" id="<?=$idF?>" value="<?=$item['fecha']?>">
                        <?php $idF++;
                    }
                    
                }?>                
                 
                </tr>
            </tbody>
        </table>
        
    </div>
    </section>
    <script>
        $(document).ready(function($){
            console.log('entra');            
            $(".id").each(function() {
        		console.log($(".id").attr('id'));
                console.log($(".id").val());

                
            });
        });



    </script>
</body>
</html>

<?php
/*
                RESPUESTA DE $ITEM
                Array ( [0] => Array ( 
                    [id] => 15 
                    [id_cliente] => 46 
                    [id_horario] => 63 
                    [comentarios] => 
                    [id_sesion] => i9kkv1jnk1n2fpftb0e159lge2a5v2kl 
                    [payment_id] => 27538916 
                    [payment_status] => Pago por ticket. Pendiente de pago 
                    [merchant_order] => 0 
                    [nombre] => Curi 
                    [apellido] => Cardenas 
                    [perfil] => cliente 
                    [email] => jcardenas@mail.com 
                    [telefono] => 2235234567 
                    [password] => 123456 
                    [id_profesional] => 15 
                    [fecha] => 2020-06-12 09:00:00 
                    [fecha_string] => Viernes, 12 de Junio de 2020, 9:00 
                    [estado] => disponible 
                    [pr_matricula] => 33333 
                    [pr_nombre] => Pedro 
                    [pr_apellido] => Alonso 
                    [pr_telefono] => 22343455432 
                    [pr_email] => palonso@mail.com 
                    [pr_resenia] => Mi reseña 
                    

                */

?>