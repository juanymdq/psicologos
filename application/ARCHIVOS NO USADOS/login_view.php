<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!--JQUERY-->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Nuestro css-->
    
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/login_nuevo.css"/>
</head>
<body>
    <header>
        <div class="menu">
		<ul>
			<li class="menu-item hidden"><a href="<?=base_url('profesional')?>">INICIAR SESIÓN PSICÓLOGOS</a></li>
		</ul>
		<ul>
			<li class="logo">
				<div class="divLogo">
					<img src="<?=base_url()?>application/assets/img/divan.png" class="imgLogo" />
				</div>
				<div class="textLogo">
					<p>Espacio de terapia online</p>
				</div>
			</li>
			
			<li class="menu-toggle">
				<button onclick="toggleMenu();">&#9776;</button>
			</li>
			<li class="menu-item hidden"><a href="<?=base_url('Welcome')?>">INICIO</a></li>	
			<li class="menu-item hidden"><a href="<?=base_url()?>login">ACCESO CLIENTES</a>
			</li>			
			<li class="menu-item hidden"><a
					href="">NOSOTROS</a>
			</li>				
		</ul>
	</div>
   
</header>
    <section>
        <div class="title">Acceso a Clientes </div>
        <div class="login-page">
            <div class="form">
                <form class="register-form" action="<?=base_url('usuarios/user_save')?>" method="post">	
                    <?php
                    if(isset($error_message)){
                        echo "<p class='error_message'>".$error_message."</p>";
                    }
                    ?>
                    <input name="nombre" id="nombre" type="text" placeholder="Nombre"> 
                    <span class="help-block"><?php echo form_error('nombre', '<div class="text-danger">', '</div>') ?></span> 
                                    
                    <input name="apellido" id="apellido" type="text" placeholder="Apellido"> 
                    <span class="help-block"><?php echo form_error('apellido', '<div class="text-danger">', '</div>') ?></span> 
                                    
                    <input name="email" id="email" type="text" placeholder="@Email"> 					
                    <span class="help-block"><?php echo form_error('email', '<div class="text-danger">', '</div>') ?></span> 
                    
                    <input name="password" id="password" type="password" class="form-control" placeholder="Password"> 
                    <span class="help-block"><?php echo form_error('password', '<div class="text-danger">', '</div>') ?></span> 
                    
                    <input name="confirm_password" id="confirm_password" type="password" placeholder="Confirmar Password"> 
                    <span class="help-block"><?php echo form_error('confirm_password', '<div class="text-danger">', '</div>') ?></span> 
                    
                    <button type="submit">Registrarse</button>
                    <p class="message">¿Ya tienes cuenta? <a href="#">Sign In</a></p>
                </form>
                <form class="login-form" action="<?=base_url('login/new_user')?>" method="post">                
                    <?php
                        if(isset($aviso_message)){
                            echo "<p class='aviso_message'>".$aviso_message."</p>";                         
                        }
                    ?>
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