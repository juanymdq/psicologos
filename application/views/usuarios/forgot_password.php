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
  </head>
  <body>
	<div class="container">		
		<div class="login-form">
			<div class="form-header">
            <img src="<?=base_url()?>application/assets/img/user.png" width="70px" height="70px" />
			</div>
			<form action="" id="forgetpassword-form" method="post"  class="form-register" role="form">
				<div>
					<input id="email" name="email" type="email" class="form-control" placeholder="Correo electrónico">  
					<span class="help-block"></span>
				</div>
				<button class="btn btn-block bt-login" type="submit" id="submit_btn" data-loading-text="Restableciendo contraseña....">Restablecer Contraseña</button>
			</form>
			<div class="form-footer">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<i class="fa fa-lock"></i>
						<a href="index.php">  Iniciar sesión  </a>					
					</div>					
					<div class="col-xs-6 col-sm-6 col-md-6">
						<i class="fa fa-check"></i>
						<a href="register.php"> Registrarse </a>
					</div>
				</div>
			</div>
		</div>
	</div>	
  </body>
</html>



<?php

//Todo------------------------------------------
public function email() {
	$CI = & get_instance();
	$CI->load->helper('url');
	$CI->load->library('session');
	$CI->config->item('base_url');

	$CI->load->library('email');

	$subject = 'Bienvenido a mi app';

	$msg = 'Mensaje de prueba';

	$CI->email
		->from('barackobama@gmail.com')
		->to($email)
		->subject($subject)
		->message($msg)
		->send();
}

?>