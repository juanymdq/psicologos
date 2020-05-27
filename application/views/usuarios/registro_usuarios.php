
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de registro de usuarios</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!-- Nuestro css -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/registerUser.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/login_css.css">
    <style>
		header .logo {
            float: left;			
            color: #ADAFAF;	
            margin-top: -7em;	
            margin-left: 2.5em;	
        }
        .textLogo {
            float: left;
            width: 380px;
            margin-left: 1em;
            margin-top: 1em;			
        }

        .textLogo p {			
            font-size: 30px;
        }

        .divLogo {
            float: left;
            margin-top: 5px
        }

        .imgLogo {
            width: 100px;
            height: 60px;
		}
	</style> 
  </head>
  <body>
	<header>
		<div class="logo">
			<a href="<?=base_url()?>">
			<div class="divLogo">
				<img 
					src="<?=base_url()?>application/assets/img/divan.png" 
					class="imgLogo"
					title="Inicio"    
				/>
			</div>            
			</a>
		</div>
	</header>
	<div class="container">		
		<div class="login-form">			
			<div class="form-header">
				<img src="<?=base_url()?>application/assets/img/user.png" width="70px" height="70px" />
				<!-- <i class="fa fa-user"></i> -->
			</div>
			<form method="post" action="" class="form-register" role="form" id="register-form">
				<div>
					<input name="name" id="name" type="text" class="form-control" placeholder="Nombres"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="email" id="email" type="email" class="form-control" placeholder="Correo electrónico" > 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="password" id="password" type="password" class="form-control" placeholder="Contraseña"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Confirmar Contraseña"> 
					<span class="help-block"></span>
				</div>
				<button class="btn btn-block bt-login" type="submit" id="submit_btn" data-loading-text="Registrando....">Registrarse</button>
			</form>
			<!--
			<div class="form-footer">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<i class="fa fa-lock"></i>
						<a href="forget_password.php"> Olvidó su contraseña? </a>					
					</div>
					
					<div class="col-xs-6 col-sm-6 col-md-6">
						<i class="fa fa-check"></i>
						<a href="index.php">  Iniciar sesión  </a>
					</div>
				</div>
			</div>
-->
		</div>
	</div>	
</body>
</html>