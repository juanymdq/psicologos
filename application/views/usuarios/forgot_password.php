<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Olvidé mi contraseña</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/login_nuevo.css"/>
  </head>
  <body>
	
  	<section>
        <div class="login-page">
			<div class="form">

			<form  class="login-form" action="<?=base_url('cliente/log_in')?>" method="post">                
                    <div class="title">Restaurar contraseña</div>
                    <input name="perfil" type="hidden" value="<?=$this->session->userdata('perfil')?>"/>
                    <input type="text" placeholder="@Email" name="email" class="form-control"/>
                    <span class="help-block"><?php echo form_error('email', '<div class="text-danger">', '</div>') ?></span> 
                    
                    <button type="submit">Restaurar contraseña</button>
			</form>
			</div>
		</div>
	</section>
  </body>
</html>