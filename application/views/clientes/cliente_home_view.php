<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>

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
	width: auto;
}
.message p {		
	color: red;
}
	
</style>
<body>
	<div class="container">
		
		<section>
		<h1>Panel de Control del cliente</h1>			

		<div class="flex-container">
			<div>
				<a href="<?=base_url()?>">
					<div class="icon"><i class="fas fa-home icono" title="Inicio"></i></div>
					<div class="div-text">Inicio</div>				
				</a>
			</div>
			<div>
				<!-- $route['cliente/editar/(:any)'] = 'Cliente/cliente_save/$1'; -->
				<a href="<?=base_url('cliente/editar/'.$this->session->userdata('id'))?>">
					<div class="icon"><i class="fas fa-user-edit icono" title="Modificar datos"></i></div>
					<div class="div-text">Modificar datos</div>
				</a>
			</div>
			<div>
				<!-- $route['cliente/listar_profesionales'] = 'Turnos'; -->
				<a href="<?=base_url('cliente/listar_profesionales')?>">
					<div class="icon"><i class="fas fa-calendar-alt icono" title="Pedir un turno"></i></div>
					<div class="div-text">Pedir un turno</div>
				</a>
			</div>  
			<div>
				<!-- $route['cliente/mis_turnos/(:any)'] = 'cliente/ver_turnos/$1'; -->
				<a href="<?=base_url('cliente/ver_turnos/'.$this->session->userdata('id'))?>">
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

		<p></p>


		</section>
    </div>
</body>
</html>