<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Olvidé mi contraseña</title>

     <!--JQUERY-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	
	<!-- Nuestro css -->
	<link href="<?=base_url()?>application/assets/css/registerUser.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/administracionStyle.css"/>
	<style>
		.login-form {
			margin-bottom: 150px;
		}
		.logo {
            float: left;			
            color: #ADAFAF;	
            margin-top: 1em;	
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

		.div-botones {
			display: flex;
 			justify-content: center;
		}

		.separator {
			margin: 5px;
		}

		.error_message {
			color: red;
			margin-bottom: 20px;
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
	<section>
		<div class="container">		
			<div class="login-form">
				<div class="form-header">
				<img src="<?=base_url()?>application/assets/img/user.png" width="70px" height="70px" />
				</div>			
				<form action="<?=base_url('usuarios/sendMail')?>" id="forgetpassword-form" method="post"  class="form-register" role="form">
					<?php
						if(isset($error_message)){
							echo "<div class='error_message'>".$error_message."</div>";						
						}
					?>
					<div>
						<input id="email" name="email" type="email" class="form-control" value="jifernandez04@hotmail.com" placeholder="Correo electrónico">  
						<span class="help-block"></span>
					</div>	
					<div class="div-botones">			
						<button class="btn bt-login" type="submit" id="submit_btn" data-loading-text="Enviando email....">Restablecer contraseña</button>
						<div class="separator"></div>
						<button class="btn btn-warning" type="button" onclick="location.href='<?=base_url('login')?>'" >Cancelar</button>
					</div>
				</form>			
			</div>
		</div>
	</section>
	<footer>	
		<div class="copyrights">
			<p>&copy; <?= date('Y') ?> Desarrolado por J.I.F</p>
		</div>
    </footer>	
  </body>
</html>