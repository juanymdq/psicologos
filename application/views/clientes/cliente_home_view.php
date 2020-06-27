<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/body.css"/>
</head>


<style>
.flex-container {
  display: flex;
  flex-wrap: wrap;  
  background-color: #4E94AE;
}

.flex-container > div {
  background-color: #f1f1f1;
  width: 150px;
  margin: 40px;
  text-align: center;
  line-height: 65px;
  
}

.icon{	
	margin: 10px;
}

.icono {
	font-size: 3em;
	color: #4E94AE;
}
.div-text {	
	font-size: 14px;
	color: #4E94AE;
	height: 40%;
}
.message {
	margin-left: 300px;		
	text-align: center;
	width: 700px;
}
.message p {		
	color: red;
}
	
</style>
<body>
	<div class="container">
		<div class="message">
				<?php 
				if(isset($message)){
                	echo "<p>".$message."</p>"; 
				}
					?>	
		</div>
		<section>
		<h1>Panel de Control del cliente</h1>
		
		<p><?php //TODO: colocar mensaje de exito de pago - ml y paypal ?></p>

		<div class="flex-container">
			<div>
				<a href="<?=base_url()?>">
					<div class="icon"><i class="fas fa-home icono" title="Inicio"></i></div>
					<div class="div-text">Inicio</div>				
				</a>
			</div>
			<div>
				<a href="<?=base_url('cliente/editar/'.$this->session->userdata('id'))?>">
					<div class="icon"><i class="fas fa-user-edit icono" title="Modificar datos"></i></div>
					<div class="div-text">Modificar datos</div>
				</a>
			</div>
			<div>
				<a href="<?=base_url('cliente/listar_profesionales')?>">
					<div class="icon"><i class="fas fa-calendar-alt icono" title="Pedir un turno"></i></div>
					<div class="div-text">Pedir un turno</div>
				</a>
			</div>  
			<div>
				<a href="">
					<div class="icon"><i class="fas fa-notes-medical icono" title="Mis turnos"></i></div>
					<div class="div-text">Mis turnos</div>
				</a>
			</div>
			<div>
				<a href="">
					<div class="icon"><i class="fas fa-credit-card icono" title="Pagos"></i></div>
					<div class="div-text">Pagos</div>					
				</a>
			</div>
			<div>
				<a href="">
					<div class="icon"><i class="fas fa-key icono" title="cambiar contraseña"></i></div>
					<div class="div-text">Cambiar contraseña</div>
				</a>
			</div>  
			<div>
				<a href="<?=base_url('cliente/logout')?>">
					<div class="icon"><i class="fas fa-power-off icono" title="Salir"></i></div>
					<div class="div-text">Cerrar sesión</div>
				</a>
			</div>
		
		</div>

		<p>Try resizing the browser window.</p>


		</section>
    </div>
</body>
</html>