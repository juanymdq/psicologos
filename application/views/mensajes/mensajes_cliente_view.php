<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       
       .cuerpo {
           height: 350px;
       }
       .message {
        margin-top: 40px;
       }
       .retorno {           
           display: flex;
           margin-top: 100px;
       }
       .retorno > a {
           text-decoration: none;
           font-size: 28px;           
           text-align: center;
           margin: 0 auto;
       }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <div class="cuerpo">
                <div class="message">
                    <?php
                    if(isset($message)){                     
                        echo "<p class='error_message'>".$message."</p>";                      
                    }
                    ?>
                </div>
                <div class="retorno">
                    <a href="<?=base_url('principal')?>">Volver</a>
                </div>
            </div>  
        </div>
    </section>
</body>
</html>
<?php
/*
MENSAJES DEL CLIENTE
1 - Se envio email con enlace para restablecer la contraseña. 
                Por favor revise el correo no deseado
2 - El token expiró. Por favor dirijase a la opción <strong>Olvide mi contraseña</strong> 
en <strong>Iniciar sesión</strong> para realizar el cambio.
3 - Modificación de password exitosa!!!



*/
?>