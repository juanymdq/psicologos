<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/login_css.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>

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
    <div class="heroe">
        <img src="<?=base_url()?>application/assets/img/acceso_clientes.jpg" class="imgHeader" />
    </div>
    </header>
    <section>
    <section id="content">

        <div class="content-wrap">

        <div class="container clearfix">

            <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

                    
            <ul class="tab-nav tab-nav2 center clearfix">
                <li class="inline-block"><a href="#tab-login">Iniciar sesión</a></li>
                <li class="inline-block"><a href="#tab-register">Registro</a></li>
            </ul>

            <div class="tab-container">

                <div class="tab-content clearfix" id="tab-login">
                <div class="card nobottommargin">
                    <div class="card-body" style="padding: 40px;">
                    <form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">
                        <input type="hidden" name="csrfmiddlewaretoken" value="pIDtUfekE5cmgGAeEA2ZkDbtS9KnjTILXrnVct3jp5K7C5huh9WxSK6nx1qJXl4m">

                        <h3>Inicio de sesión para psicólogos</h3>

                        

        <div id="div_id_username" class="form-group"> <label for="id_username" class=" requiredField">
                    Nombre de usuario<span class="asteriskField">*</span> </label> <div class=""> <input type="text" name="username" autofocus class="textinput textInput form-control" required id="id_username"> </div> </div> <div id="div_id_password" class="form-group"> <label for="id_password" class=" requiredField">
                    Contraseña<span class="asteriskField">*</span> </label> <div class=""> <input type="password" name="password" class="textinput textInput form-control" required id="id_password"> </div> </div>


                        <div class="col_full nobottommargin">
                        <button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Iniciar sesión</button>
                        <a href="/password-reset/" class="fright">¿Olvidaste tu contraseña?</a>
                        </div>

                    </form>
                    </div>
                </div>
                </div>

                <div class="tab-content clearfix" id="tab-register">
                <div class="card nobottommargin">
                    <div class="card-body" style="padding: 40px;">
                    <h3>Registro de usuarios</h3>
                    <p>Deberías completar este formulario si estás interesado en formar parte del equipo de colaboradores de Psicositio.</p>

                    <form id="register-form" name="register-form" class="nobottommargin" action="/registro/" method="post">
                        <input type="hidden" name="csrfmiddlewaretoken" value="pIDtUfekE5cmgGAeEA2ZkDbtS9KnjTILXrnVct3jp5K7C5huh9WxSK6nx1qJXl4m">

                        

        <div id="div_id_username" class="form-group"> <label for="id_username" class=" requiredField">
                    Nombre de usuario<span class="asteriskField">*</span> </label> <div class=""> <input type="text" name="username" maxlength="150" autofocus class="textinput textInput form-control" required id="id_username"> <small id="hint_id_username" class="form-text text-muted">Requerido. 150 carácteres como máximo. Únicamente letras, dígitos y @/./+/-/_ </small> </div> </div> <div id="div_id_first_name" class="form-group"> <label for="id_first_name" class="">
                    Nombre
                </label> <div class=""> <input type="text" name="first_name" maxlength="30" class="textinput textInput form-control" id="id_first_name"> </div> </div> <div id="div_id_last_name" class="form-group"> <label for="id_last_name" class="">
                    Apellidos
                </label> <div class=""> <input type="text" name="last_name" maxlength="150" class="textinput textInput form-control" id="id_last_name"> </div> </div> <div id="div_id_email" class="form-group"> <label for="id_email" class=" requiredField">
                    Email<span class="asteriskField">*</span> </label> <div class=""> <input type="email" name="email" class="emailinput form-control" required id="id_email"> </div> </div> <div id="div_id_password1" class="form-group"> <label for="id_password1" class=" requiredField">
                    Contraseña<span class="asteriskField">*</span> </label> <div class=""> <input type="password" name="password1" class="textinput textInput form-control" required id="id_password1"> </div> </div> <div id="div_id_password2" class="form-group"> <label for="id_password2" class=" requiredField">
                    Contraseña (confirmación)<span class="asteriskField">*</span> </label> <div class=""> <input type="password" name="password2" class="textinput textInput form-control" required id="id_password2"> <small id="hint_id_password2" class="form-text text-muted">Para verificar, introduzca la misma contraseña anterior.</small> </div> </div>


                        <div class="col_full nobottommargin">
                        <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Registrarme</button>
                        </div>

                    </form>
                    </div>
                </div>
                </div>

            </div>
                    

            </div>

        </div>

        </div>

</section><!-- #content end -->
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
</body>
</html>