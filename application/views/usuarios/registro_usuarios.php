
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
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/administracionStyle.css"/>
	
    <style>
		.error_message {
			color: red;
			text-align: center;
		}
	</style> 
  </head>  
  <body>		
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
		
	<div class="container">		
		<div class="login-form">			
			<div class="form-header">
				<img src="<?=base_url()?>application/assets/img/user.png" width="70px" height="70px" />
				
			</div>
			<form action="<?=base_url('usuarios/user_save')?>" id="register-form" method="post"  class="form-register" role="form">										
				<?php
				if(isset($error_message)){
					echo "<p class='error_message'>".$error_message."</p>";
				}
				?>
				<div>				
					<input value="<?=$nombre?>" name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre"> 
					<span class="help-block"><?php echo form_error('nombre', '<div class="text-danger">', '</div>') ?></span> 
				</div>
				<div>				
					<input value="<?=$apellido?>" name="apellido" id="apellido" type="text" class="form-control" placeholder="Apellido"> 
					<span class="help-block"><?php echo form_error('apellido', '<div class="text-danger">', '</div>') ?></span> 
				</div>
				<div>				
					<input value="<?=$email?>" name="email" id="email" type="text" class="form-control" placeholder="@Email"> 					
					<span class="help-block"><?php echo form_error('email', '<div class="text-danger">', '</div>') ?></span> 
				</div>
				<?php
				if($registra){
				?>
					<div>
						<input name="password" id="password" type="password" class="form-control" placeholder="Password"> 
						<span class="help-block"><?php echo form_error('password', '<div class="text-danger">', '</div>') ?></span> 
					</div>
					<div>
						<input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Confirmar Password"> 
						<span class="help-block"><?php echo form_error('confirm_password', '<div class="text-danger">', '</div>') ?></span> 
					</div>
					<div class="div-botones">
						<button class="btn bt-login" type="submit" id="submit_btn" data-loading-text="Registrando....">Registrarse</button>
						<div class="separator"></div>
						<button class="btn btn-warning" type="button" onclick="location.href='<?=base_url('login')?>'" >Cancelar</button>
					</div>
				<?php }else{?>
					<div class="div-botones">
						<button class="btn bt-login" type="submit" id="submit_btn" data-loading-text="Actualizando....">Actualizar</button>
						<div class="separator"></div>
						<button class="btn btn-warning" type="button" onclick="location.href='<?=base_url('cliente')?>'" >Cancelar</button>
						<!--<a href="" class="btn bt-login">Cancelar</a>-->
					</div>
				<?php }?>
			</form>
			
		</div>
	</div>
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