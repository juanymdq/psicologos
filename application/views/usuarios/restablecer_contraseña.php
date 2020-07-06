<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Olvidé mi contraseña</title>

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
		//TODO: dar formato a todo el formulario
		<div class="container">		
			<div class="login-form">
				<div class="form-header">
				<img src="<?=base_url()?>application/assets/img/user.png" width="70px" height="70px" />
				</div>
				<form action="<?=base_url('usuarios/cambio_de_password')?>" id="forgetpassword-form" method="post"  class="form-register" role="form">
						<?php
							if(isset($error_message)){
								echo "<p class='error_message'>".$error_message."</p>";
							}
						?>
						<input type="hidden" name="id_user" value="<?=$id_user?>"/>
						<div>
							<input name="password" id="password" type="password" class="form-control" placeholder="Password"> 
							<span class="help-block"><?php echo form_error('password', '<div class="text-danger">', '</div>') ?></span> 
						</div>
						<div>
							<input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Confirmar Password"> 
							<span class="help-block"><?php echo form_error('confirm_password', '<div class="text-danger">', '</div>') ?></span> 
						</div>
						<a href=""></a>
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