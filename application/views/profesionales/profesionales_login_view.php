<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/login_nuevo.css"/>
</head>
<body>
    
    <section>
        
        <div class="login-page">
        <div class="title">Acceso a Profesionales </div>            
            <div class="form">            
                <form style="display: <?php 
                                        if(isset($registra)){                                            
                                                echo 'block';
                                        }else{
                                            echo 'none';
                                        }
                                           
                                           ?>;" class="register-form" action="<?=base_url('profesional/profesional_save')?>" method="post">	
                    <div class="encabezado">
                        <div class=enc-titulo>
                            Registro de Profesionales
                        </div>
                        <div class="enc-cuerpo">
                            Deberías completar este formulario si estás interesado en formar parte del equipo de colaboradores de TerapiaVirtual.
                        </div>
                    </div>
                    <?php
                    if(isset($error_message)){
                        echo "<p class='error_message'>".$error_message."</p>";
                    }
                    ?>
                    <input name="perfil" type="hidden" value="profesional"/>                    

                    <input value="<?=(isset($nombre)) ? $nombre : ""?>" name="nombre" id="nombre" type="text" placeholder="Nombre">                     
                    <span class="help-block"><?php echo form_error('nombre', '<div class="text-danger">', '</div>') ?></span> 
                                    
                    <input value="<?=(isset($apellido)) ? $apellido : ""?>" name="apellido" id="apellido" type="text" placeholder="Apellido"> 
                    <span class="help-block"><?php echo form_error('apellido', '<div class="text-danger">', '</div>') ?></span> 

                    <input value="<?=(isset($telefono)) ? $telefono : ""?>" name="telefono" id="telefono" type="text" placeholder="Teléfono"> 
                    <span class="help-block"><?php echo form_error('telefono', '<div class="text-danger">', '</div>') ?></span> 
                                    
                    <input value="<?=(isset($email)) ? $email : ""?>" name="email" id="email" type="text" placeholder="@Email"> 					
                    <span class="help-block"><?php echo form_error('email', '<div class="text-danger">', '</div>') ?></span>                     
                    
                    <button type="submit">Enviar solicitud</button>
                    <p class="message">¿Ya tienes cuenta? <a href="#">Sign In</a></p>
                </form>
                <form style="display: <?php 
                                        if(isset($registra)){                                            
                                                echo 'none';
                                        }else{
                                            echo 'block';
                                        }
                                           
                                           ?>;" class="login-form" action="<?=base_url('profesional/login_profesionales')?>" method="post">                
                   <?php
                        if(isset($error_message)){
                            echo "<p class='error_message'>".$error_message."</p>";                         
                        }
                    ?>
                    <input name="perfil" type="hidden" value="profesional"/>
                    <input type="text" placeholder="@Email" name="email"/>
                    <span class="help-block"><?php echo form_error('email', '<div class="text-danger">', '</div>') ?></span>
                    <input type="password" placeholder="Password" name="password"/>
                    <span class="help-block"><?php echo form_error('password', '<div class="text-danger">', '</div>') ?></span>
                    <button type="submit">Ingresar </button>
                    <p class="message">¿No estás registrado? <a href="#">Crear una cuenta</a></p>
                </form>
            </div>
        </div>

    </section>

    <script>
        $('.message a').click(function(){            
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
    </script>
</body>
</html>