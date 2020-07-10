<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
	<head>
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
		height: 30%;		
	}
	.message {	
		width: auto;
	}
	.message p {		
		color: red;
	}
		
	</style>
	</head>


<body>
	<div class="container">
		
		<section>
		<h1>Panel de Control delProfesional</h1>			

		<div class="flex-container">
			<div>
				<a href="<?=base_url()?>">
					<div class="icon"><i class="fas fa-home icono" title="Inicio"></i></div>
					<div class="div-text">Inicio</div>				
				</a>
			</div>
			<div>
				<!-- $route['profesional/editar/(:any)'] = 'Profesional/profesional_save/$1'; -->
				<a href="<?=base_url('profesional/editar/'.$this->session->userdata('id'))?>">
					<div class="icon"><i class="fas fa-user-edit icono" title="Mi perfil"></i></div>
					<div class="div-text">Mi Perfil</div>
				</a>
			</div>
			<div>
				<!--  -->
				<a href="<?=base_url('profesional/listar_clientes')?>">
					<div class="icon"><i class="fas fa-calendar-alt icono" title="Listar Clientes"></i></div>
					<div class="div-text">Listar Clientes</div>
				</a>
			</div>  
			<div>
				<!--  -->
				<a href="<?=base_url('profesional/find_all_eventos?prof='.$this->session->userdata('id').'&accion=0')?>">
					<div class="icon"><i class="fas fa-notes-medical icono" title="Horarios"></i></div>
					<div class="div-text">Cargar horarios de atención</div>
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