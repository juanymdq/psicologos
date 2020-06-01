<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profesionales</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- STYLES -->
	  <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>

	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>application/assets/css/inicio.css"/>
</head>

<body>

<!-- HEADER: MENU + HEROE SECTION -->
	<header>
		<p>PROFESIONALES</p>
		<div class="menu">
			<ul>
				<li class="logo">
					<div class="divLogo">
						<img src="<?=base_url()?>application/assets/img/divan.png" class="imgLogo" />
					</div>
					<div class="textLogo">
						<p>Espacio de terapia online</p>
					</div>
				</li>	
				<li class="item-user">Bienvenido</li>
				<li><?=$this->session->userdata('id')?></li>
				<li><?=$this->session->userdata('perfil')?></li>
				<li class="item-user"><?php echo $this->session->userdata('nombre') . " " . $this->session->userdata('apellido');?></li>
					
			</ul>
		</div>		
	</header>
	<section>		
		<div class="wrapper">
			<a href="<?=base_url()?>"><div class="one"><i class="fas fa-home icono" title="Inicio"></i><label class="div-text">Inicio</label></div></a>
			<a href="<?=base_url('usuarios/user_save/'.$this->session->userdata('id'))?>"><div class="two"><i class="fas fa-user-edit icono" title="Modificar datos"></i><label class="div-text">Modificar datos</label></div></a>			
			<a href=""><div class="three"><i class="fas fa-calendar-alt icono" title="Turnos"></i><label class="div-text">Turnos</label></div></a>			
			<a href=""><div class="four"><i class="fas fa-notes-medical icono" title="Historial"></i><label class="div-text">Historial</label></div></a>
			<a href=""><div class="five"><i class="fas fa-credit-card icono" title="Pagos"></i><label class="div-text">Pagos</label></div></a>
			<a href=""><div class="six"><i class="fas fa-key icono" title="cambiar contraseña"></i><label class="div-text">Cambiar contraseña</label></div></a>
			<a href="<?=base_url('login/logout')?>"><div class="seven"><i class="fas fa-power-off icono" title="Salir"></i><label class="div-text">Salir</label></div></a>
		</div>
    </section>
    <footer>	
		<div class="copyrights">
			<p>&copy; <?= date('Y') ?> Desarrolado por J.I.F</p>
		</div>
    </footer>
</body>
</html>