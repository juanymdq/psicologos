<!DOCTYPE html>
<html lang="en">
  <head>
 
    <title>Olvidé mi contraseña</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/login_nuevo.css"/>
  </head>
  <body>
	
	<section>
		

		<div class="login-page">
		<?php
			if(isset($error_message)){
				echo "<p class='error_message'>".$error_message."</p>";
			}
		?>
          <div class="form">
			<form  class="login-form" action="<?=base_url('cliente/cambio_de_password')?>" method="post"> 
				<input type="text" name="id_user" value="<?=$id_user?>"/>               
                <div class="title">Cambiar contraseña</div>
                <input name="perfil" type="hidden" value="<?=$this->session->userdata('perfil')?>"/>
				<div>
					<input name="password" id="password" type="password" class="form-control" placeholder="Password"> 
					<span class="help-block"><?php echo form_error('password', '<div class="text-danger">', '</div>') ?></span> 
				</div>
				<div>
					<input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Confirmar Password"> 
					<span class="help-block"><?php echo form_error('confirm_password', '<div class="text-danger">', '</div>') ?></span> 
				</div>
                <button type="submit">Restaurar contraseña</button>
            </form>
          </div>
		    </div>
	</section>
	
  </body>
</html>