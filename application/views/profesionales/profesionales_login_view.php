<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!--JQUERY-->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Nuestro css-->
    
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/login_nuevo.css"/>
    <style>

        
    </style>
</head>
<body>
    <header>
        <div class="menu-uno">
            <div class="menu-uno-usuario">				
               
            </div>
            <div class="menu-uno-btn">
                <a href="" class="btn-turnos">TURNOS</a>
                <a href="<?=base_url('profesional/acceso_profesionales')?>" class="menu-uno-link">INICIAR SESIÓN PSICOLOGOS</a>			
            </div>
        </div>
        <div class="menu-dos">
            <div class="menu-dos-img"><img src="<?=base_url()?>application/assets/img/divan.png" class="imgLogo" /></div>
            <div class="menu-dos-text">Terapia Virtual</div>
            <div class="menu-dos-link">
                <a href="<?=base_url('Welcome')?>" class="menu-dos-link-text">INICIO</a>                
                <a href="" class="menu-dos-link-text">NOSOTROS</a>
                <a href="<?=base_url('webcam')?>" class="">WEBCAM</a>
                <a href="" class="menu-dos-link-text">INICIO</a>			
            </div>
        </div>
    </header>
    <section>
        <div class="title">Acceso a Profesionales </div>
        <div class="login-page">            
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
                    <input type="password" placeholder="Password" name="password"/>                                        
                    <button type="submit">Ingresar </button>
                    <p class="message">¿No estás registrado? <a href="#">Crear una cuenta</a></p>
                </form>
            </div>
        </div>

    </section>
    <footer>	
    <div class="copyrights">
		<div class="container_footer">
			<div class="col_full">
				<div class="copyrights-menu">
					<a href="/">Inicio</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="/acerca-de/">Acerca de</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="<?=base_url('Welcome/privacidad')?>">Política de Privacidad</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="/ayuda/">Ayuda</a>
				</div>
				<div class="copyrights-text">
				Copyrights &copy; <?= date('Y') ?> Todos los derechos reservados.
				</div>
			</div>
		</div>
	</div>
    </footer>
    <script>
        $('.message a').click(function(){            
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
    </script>
</body>
</html>