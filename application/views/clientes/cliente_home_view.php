<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/body.css"/>
</head>
<style>

	.wrapper {		
		margin-left: 30px;
		padding-top: 50px;
		padding-bottom: 30px;
		display: grid;
				/*esp filas  esp columnas */
		grid-gap: 4rem 20em;
		grid-template-columns: 120px 120px 120px;
		grid-template-rows: 110px 110px 110px;		
	}

	.div-text{
		margin-top: 10px;
		color: black;		
	}
	.icono {
		font-size: 4em;		
		color: #052262;
	}
	.one {
		grid-column: 1;
		grid-row: 1;					
		text-align: center;
	}
	.two { 
		grid-column: 2;
		grid-row: 1;		
		text-align: center;			
	}
	.three {
		grid-column: 3;
		grid-row: 1;
		text-align: center;		
	}
	.four {
		grid-column: 1;
		grid-row: 2;
		text-align: center;
	}
	.five {
		grid-column: 2;
		grid-row: 2;		
		text-align: center;
		
	}
	.six {
		grid-column: 3;
		grid-row: 2;		
		text-align: center;
	}
	.seven {
		grid-column: 1;
		grid-row: 3;		
		text-align: center;		
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
			<div class="wrapper">
					
				<a href="<?=base_url()?>"><div class="one"><i class="fas fa-home icono" title="Inicio"></i><label class="div-text">Inicio</label></div></a>
				<a href="<?=base_url('cliente/editar/'.$this->session->userdata('id'))?>"><div class="two"><i class="fas fa-user-edit icono" title="Modificar datos"></i><label class="div-text">Modificar datos</label></div></a>			
				<a href="<?=base_url('cliente/listar_profesionales')?>"><div class="three"><i class="fas fa-calendar-alt icono" title="Turnos"></i><label class="div-text">Turnos</label></div></a>			
				<a href=""><div class="four"><i class="fas fa-notes-medical icono" title="Historial"></i><label class="div-text">Historial</label></div></a>
				<a href=""><div class="five"><i class="fas fa-credit-card icono" title="Pagos"></i><label class="div-text">Pagos</label></div></a>
				<a href=""><div class="six"><i class="fas fa-key icono" title="cambiar contraseña"></i><label class="div-text">Cambiar contraseña</label></div></a>
				<a href="<?=base_url('cliente/logout')?>"><div class="seven"><i class="fas fa-power-off icono" title="Salir"></i><label class="div-text">Cerrar sesión</label></div></a>
			</div>
		</section>
    </div>
</body>
</html>